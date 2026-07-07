<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * 1. Menampilkan Semua Koleksi Foto KHUSUS Halaman Utama (Home)
     */
    public function index()
    {
        $galleries = Gallery::whereIn('parent_type', ['destination', 'discover_home'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.galleries', compact('galleries'));
    }

    /**
     * 2. Menampilkan Form Unggah Foto Baru
     */
    public function create()
    {
        return view('admin.galleries_create');
    }

    /**
     * 3. Memproses Pengajuan Foto Baru via Approval Owner
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption'     => 'nullable|string|max:255',
            'parent_type' => 'required|in:destination,discover',
            'image_name'  => 'required|string', // Menggunakan input string nama file
        ]);

        $path = 'galleries/' . $request->image_name;

        $payload = [
            'parent_type' => $request->parent_type === 'discover' ? 'destination' : $request->parent_type,
            'parent_id'   => $request->parent_type === 'discover' ? 999 : 0,
            'file_path'   => $path,
            'caption'     => $request->caption ?? 'SCENERY',
        ];

        ApprovalRequest::create([
            'model_type'  => Gallery::class,
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', '🚀 Pengajuan foto galeri utama baru berhasil dikirim ke Owner!');
    }

    /**
     * 4. Mengajukan Penghapusan Foto via Approval Owner
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        $payload = [
            'parent_type' => $gallery->parent_type,
            'parent_id'   => $gallery->parent_id,
            'file_path'   => $gallery->file_path,
            'caption'     => $gallery->caption,
        ];

        ApprovalRequest::create([
            'model_type'  => Gallery::class,
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', '🚀 Pengajuan penghapusan foto galeri berhasil dikirim ke Owner!');
    }
}
