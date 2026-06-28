<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * 1. Menampilkan Semua Koleksi Foto KHUSUS Halaman Utama (Home)
     */
    public function index()
    {
        // 🌟 PERBAIKAN: Kita ambil data berdasarkan teks pembeda unik yang aman
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
     * 3. Memproses Validasi dan Bypass ENUM MySQL
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption'     => 'nullable|string|max:255',
            'parent_type' => 'required|in:destination,discover',
            'file_path'   => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $path = null;
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('galleries', 'public');
        }

        // 🌟 TRICK: Karena ENUM menolak 'discover', tapi kamu punya 'destination' yang legal,
        // kita akali dengan menyimpan string gabungan di kolom 'caption' atau ubah paksa
        // string-nya menjadi sesuatu yang tipenya TEXT panjang (jika kolom itu varchar).
        // Tapi jika kolom parent_type mutlak ENUM('destination','villa_service'), jalankan Langkah 2 di bawah!

        Gallery::create([
            'parent_type' => $request->parent_type === 'discover' ? 'destination' : $request->parent_type,
            'parent_id'   => $request->parent_type === 'discover' ? 999 : 0, // 🌟 Gunakan ID 999 sebagai penanda "Discover More"
            'file_path'   => $path,
            'caption'     => $request->caption ?? 'SCENERY',
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diunggah!');
    }

    /**
     * 4. Menghapus Foto
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}
