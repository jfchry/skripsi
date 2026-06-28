<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * 3. Memproses Penyimpanan Foto Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255', // Validasi input form tetap 'title'
            'image_url' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // Validasi input file tetap 'image_url'
        ]);

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('villa_services', 'public');

            Gallery::create([
                'parent_id'   => 0,
                'parent_type' => 'villa_service',
                'caption'     => $request->title,     // 🌟 DIALIKHAN: Input 'title' disimpan ke kolom 'caption'
                'file_path'   => $path,               // 🌟 DIALIKHAN: Path disimpan ke kolom 'file_path'
            ]);
        }

        return redirect()->route('admin.villa.index')->with('success', 'Foto fasilitas villa baru berhasil diunggah!');
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
     * 5. Memproses Pembaruan Data & File Foto
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('parent_type', 'villa_service')->findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus berkas fisik gambar lama jika diganti
            if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            // Simpan gambar baru ke kolom file_path
            $gallery->file_path = $request->file('image_url')->store('villa_services', 'public');
        }

        $gallery->caption = $request->title; // 🌟 Diperbarui ke kolom 'caption'
        $gallery->save();

        return redirect()->route('admin.villa.index')->with('success', 'Data galeri villa berhasil diperbarui!');
    }

    /**
     * 6. Menghapus Foto Galeri
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('parent_type', 'villa_service')->findOrFail($id);

        // 🌟 DIUBAH: Membaca properti 'file_path' untuk penghapusan berkas lokal
        if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();
        return redirect()->route('admin.villa.index')->with('success', 'Foto fasilitas berhasil dihapus.');
    }
}
