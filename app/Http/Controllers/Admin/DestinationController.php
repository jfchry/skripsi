<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * 1. Menampilkan Daftar Destinasi di Halaman Admin (Fitur Read)
     */
    public function index()
    {
        // Mengambil semua data destinasi dari database
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
     * 3. Memproses Penyimpanan Data Baru dan Upload Gambar (Fitur Create - Action)
     */
    public function store(Request $request)
    {
        // Validasi input data dari form admin agar aman sesuai tipe data DB
        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_url'            => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto maks 2MB
        ]);

        $path = null;

        // Proses Logika Upload Gambar ke Server
        if ($request->hasFile('image_url')) {
            // Menyimpan file gambar asli ke folder: storage/app/public/destinations
            $path = $request->file('image_url')->store('destinations', 'public');
        }

        // Simpan data string teks & path gambar ke database melalui Model Destination
        Destination::create([
            'name'                 => $request->name,
            'location_description' => $request->location_description,
            'image_url'            => $path,
        ]);

        // Mengembalikan pengguna ke halaman utama tabel dengan membawa flash message sukses
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan Halaman Form Edit Data Lama (Fitur Update - View)
     */
    public function edit($id)
    {
        // Mencari data destinasi berdasarkan ID, jika tidak ketemu otomatis memunculkan error 404
        $destination = Destination::findOrFail($id);

        return view('admin.destinations_edit', compact('destination'));
    }

    /**
     * 5. Memproses Perubahan Data Lama (Fitur Update - Action)
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        // Validasi input form (Foto bersifat opsional saat proses edit)
        $request->validate([
            'name'                 => 'required|string|max:255',
            'location_description' => 'required|string',
            'image_url'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Memperbarui data teks
        $destination->name = $request->name;
        $destination->location_description = $request->location_description;

        // Cek apakah admin mengunggah file foto baru?
        if ($request->hasFile('image_url')) {
            // Hapus file foto fisik yang lama dari server storage agar tidak menumpuk jadi sampah
            if ($destination->image_url && Storage::disk('public')->exists($destination->image_url)) {
                Storage::disk('public')->delete($destination->image_url);
            }

            // Proses upload file foto baru
            $path = $request->file('image_url')->store('destinations', 'public');
            $destination->image_url = $path;
        }

        // Simpan perubahan ke database
        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil diperbarui!');
    }

    /**
     * 6. Menghapus Data Destinasi dan File Fotonya (Fitur Delete)
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        // 1. Hapus file foto fisik di folder storage terlebih dahulu
        if ($destination->image_url && Storage::disk('public')->exists($destination->image_url)) {
            Storage::disk('public')->delete($destination->image_url);
        }

        // 2. Hapus data baris dari tabel database
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil dihapus!');
    }
}
