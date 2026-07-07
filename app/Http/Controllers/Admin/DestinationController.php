<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\ApprovalRequest; // 🌟 WAJIB DIIMPORT UNTUK WORKFLOW OWNER
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    /**
     * 1. Menampilkan Daftar Destinasi di Halaman Admin (Fitur Read)
     */
    public function index()
    {
        // Mengambil semua data destinasi dari database utama
        $destinations = Destination::all();

        // Mengirim data ke file resources/views/admin/destinations.blade.php
        return view('admin.destinations', compact('destinations'));
    }

    /**
     * 2. Menampilkan Halaman Form Tambah Destinasi (Fitur Create - View)
     */
    public function create()
    {
        return view('admin.destinations_create');
    }

   /**
     * 3. WORKFLOW JSON: Memproses data baru (Create - Action)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_url'            => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $path = null;

        // Memastikan file ditangkap dengan benar dari name="image_url" di HTML
        if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {
            $file = $request->file('image_url');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menggunakan move() langsung ke public storage agar sinkron dengan update & link Laragon
            $file->move(public_path('storage/destinations'), $fileName);
            $path = 'destinations/' . $fileName;
        }

        $payload = [
            'name'                 => $request->name,
            'location_description' => $request->location_description,
            'image'                => $path,
            'image_url'            => $path,
        ];

        \App\Models\ApprovalRequest::create([
            'model_type'  => \App\Models\Destination::class,
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => \Illuminate\Support\Facades\Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', '🚀 Pengajuan destinasi baru berhasil dikirim! Menunggu persetujuan Owner.');
    }

    /**
     * 4. WORKFLOW JSON: Memproses modifikasi data (Update - Action)
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_url'            => 'nullable',
        ]);

        // Mengambil file bawaan asli dari database jika tidak ganti foto
        $path = $destination->image_url ?? $destination->image;

        $fileKey = $request->hasFile('image_url') ? 'image_url' : ($request->hasFile('image') ? 'image' : ($request->hasFile('photo') ? 'photo' : null));

        if ($fileKey && $request->file($fileKey)->isValid()) {
            $file = $request->file($fileKey);
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/destinations'), $fileName);
            $path = 'destinations/' . $fileName;
        }

        $payload = [
            'name'                 => $request->name,
            'location_description' => $request->location_description,
            'image'                => $path,
            'image_url'            => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => Destination::class,
            'model_id'    => $id,
            'action_type' => 'update',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', '🔄 Permohonan modifikasi destinasi berhasil dikirim ke Owner untuk diperiksa!');
    }

    /**
     * 6. 🌟 WORKFLOW JSON: Membelokkan Proses Hapus Data (Delete)
     */
    public function destroy($id)
    {
        // Pastikan datanya eksis
        $destination = Destination::findOrFail($id);

        // Pengapusan dimasukkan ke antrean izin owner dengan payload nama konten yang jelas
        ApprovalRequest::create([
            'model_type'  => Destination::class,
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => [
                'name' => $destination->name
            ],
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', '⚠️ Permohonan penghapusan destinasi telah diajukan kepada Owner!');
    }

    /**
     * 7. Menyembunyikan notifikasi penolakan dengan mengubah status menjadi 'seen'
     */
    public function dismissNotification($id)
    {
            $approval = ApprovalRequest::where('id', $id)
                                ->where('user_id', Auth::id())
                                ->firstOrFail();

            $approval->update([
            'status' => 'seen'
            ]);

        return redirect()->back()->with('success', 'Notifikasi penolakan berhasil diarsipkan.');
    }

}
