<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillaRoomController extends Controller
{
    /**
     * 1. Menampilkan Semua Data Kamar
     */
    public function index()
    {
        $rooms = VillaService::orderBy('created_at', 'desc')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * 2. Form Tambah Kamar Baru
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * 3. Memproses Penyimpanan Kamar Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric',
            'description'  => 'required|string',
            'image_url'    => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $path = null;
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('rooms', 'public');
        }

        VillaService::create([
            'service_name' => $request->service_name,
            'price'        => $request->price,
            'description'  => $request->description,
            'icon_url'     => $path, // Menyimpan file path foto ke kolom icon_url
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Tipe kamar baru berhasil didaftarkan!');
    }

    /**
     * 4. Form Edit Data & Spesifikasi Kamar 🌟
     */
    public function edit($id)
    {
        $room = VillaService::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * 5. Memproses Pembaruan Data Kamar 🌟
     */
    public function update(Request $request, $id)
    {
        $room = VillaService::findOrFail($id);

        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric',
            'description'  => 'required|string',
            'image_url'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072', // Nullable karena foto bersifat opsional saat edit
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus berkas fisik foto lama dari storage jika admin mengunggah foto baru
            if ($room->icon_url && Storage::disk('public')->exists($room->icon_url)) {
                Storage::disk('public')->delete($room->icon_url);
            }
            // Simpan berkas foto yang baru
            $room->icon_url = $request->file('image_url')->store('rooms', 'public');
        }

        // Perbarui record data tekstual di database
        $room->update([
            'service_name' => $request->service_name,
            'price'        => $request->price,
            'description'  => $request->description,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Data spesifikasi kamar berhasil diperbarui!');
    }

    /**
     * 6. Menghapus Data Kamar Beserta Berkas Gambar
     */
    public function destroy($id)
    {
        $room = VillaService::findOrFail($id);

        if ($room->icon_url && Storage::disk('public')->exists($room->icon_url)) {
            Storage::disk('public')->delete($room->icon_url);
        }

        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}
