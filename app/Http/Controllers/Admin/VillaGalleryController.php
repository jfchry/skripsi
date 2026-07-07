<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillaGalleryController extends Controller
{
    /**
     * 1. Menampilkan semua foto fasilitas villa
     */
    public function index()
    {
        $galleries = Gallery::where('parent_type', 'villa_service')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin.villa.index', compact('galleries'));
    }

    /**
     * 2. Form Unggah Foto Baru
     */
    public function create()
    {
        return view('admin.villa.create');
    }

    /**
     * 3. Memproses Penyimpanan Foto Baru via Approval Owner
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'image_name' => 'required|string', // Disinkronkan menggunakan nama file string
        ]);

        $path = 'villa_services/' . $request->image_name;

        $payload = [
            'parent_id'   => 0,
            'parent_type' => 'villa_service',
            'caption'     => $request->title,
            'file_path'   => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => Gallery::class,
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.villa.index')
            ->with('success', '🚀 Pengajuan foto galeri villa baru berhasil dikirim ke Owner!');
    }

    /**
     * 4. Form Edit Data & File Foto
     */
    public function edit($id)
    {
        $gallery = Gallery::where('parent_type', 'villa_service')->findOrFail($id);
        return view('admin.villa.edit', compact('gallery'));
    }

    /**
     * 5. Memproses Pembaruan Data via Approval Owner
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('parent_type', 'villa_service')->findOrFail($id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'image_name' => 'nullable|string',
        ]);

        $path = $gallery->file_path;
        if ($request->filled('image_name')) {
            $path = 'villa_services/' . $request->image_name;
        }

        $payload = [
            'parent_id'   => $gallery->parent_id,
            'parent_type' => 'villa_service',
            'caption'     => $request->title,
            'file_path'   => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => Gallery::class,
            'model_id'    => $id,
            'action_type' => 'update',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.villa.index')
            ->with('success', '🔄 Permohonan modifikasi galeri villa berhasil dikirim ke Owner!');
    }

    /**
     * 6. Menghapus Foto Galeri via Approval Owner
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('parent_type', 'villa_service')->findOrFail($id);

        $payload = [
            'parent_id'   => $gallery->parent_id,
            'parent_type' => 'villa_service',
            'caption'     => $gallery->caption,
            'file_path'   => $gallery->file_path,
        ];

        ApprovalRequest::create([
            'model_type'  => Gallery::class,
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.villa.index')
            ->with('success', '🚀 Pengajuan penghapusan foto galeri villa berhasil dikirim ke Owner!');
    }
}
