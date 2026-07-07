<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\ApprovalRequest;
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
     * 3. WORKFLOW JSON: Memproses pengajuan data baru (Create - Action)
     */
    public function store(Request $request)
    {
        // Validasi teks biasa, menggunakan input teks nama file untuk menghindari eror folder lokal tmp
        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_name'           => 'required|string',
        ]);

        $path = 'destinations/' . $request->image_name;

        // Masukkan data form ke payload JSON untuk antrean Owner
        $payload = [
            'name'                 => $request->name,
            'location_description' => $request->location_description,
            'image'                => $path,
            'image_url'            => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => Destination::class,
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', '🚀 Pengajuan destinasi baru beserta foto berhasil dikirim ke Owner!');
    }

    /**
     * 🌟 4. MENAMPILKAN FORM EDIT DESTINASI (View Edit)
     * Ditambahkan agar tombol edit berfungsi dan tidak memicu eror 500/404
     */
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations_edit', compact('destination'));
    }

    /**
     * 5. WORKFLOW JSON: Memproses permohonan modifikasi data (Update - Action)
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        // Validasi diselaraskan menggunakan input string nama file (image_name) agar serasi
        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_name'           => 'nullable|string',
        ]);

        // Mengambil file bawaan asli dari database jika input kosong (tidak ganti foto)
        $path = $destination->image_url ?? $destination->image;

        // Jika Admin mengetikkan nama file baru, gunakan nama file tersebut
        if ($request->filled('image_name')) {
            $path = 'destinations/' . $request->image_name;
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
     * 6. WORKFLOW JSON: Membelokkan Proses Hapus Data (Delete)
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        // Mengirim seluruh data properti objek secara utuh agar terbaca sempurna di preview Owner
        $payload = [
            'name'                 => $destination->name,
            'location_description' => $destination->location_description,
            'image'                => $destination->image,
            'image_url'            => $destination->image_url,
        ];

        ApprovalRequest::create([
            'model_type'  => Destination::class,
            'model_id'    => $destination->id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', '🚀 Pengajuan penghapusan destinasi berhasil dikirim ke Owner!');
    }
}
