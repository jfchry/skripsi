<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillaService;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * 3. Memproses Penyimpanan Kamar Baru via Approval Owner
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric',
            'description'  => 'required|string',
            'image_name'   => 'required|string', // Diselaraskan menggunakan string nama file
        ]);

        $path = 'rooms/' . $request->image_name;

        $payload = [
            'service_name' => $request->service_name,
            'price'        => $request->price,
            'description'  => $request->description,
            'icon_url'     => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => VillaService::class,
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('success', '🚀 Pengajuan kamar baru berhasil dikirim ke Owner!');
    }

    /**
     * 4. Form Edit Data & Spesifikasi Kamar
     */
    public function edit($id)
    {
        $room = VillaService::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * 5. Memproses Pembaruan Data Kamar via Approval Owner
     */
    public function update(Request $request, $id)
    {
        $room = VillaService::findOrFail($id);

        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric',
            'description'  => 'required|string',
            'image_name'   => 'nullable|string',
        ]);

        $path = $room->icon_url;
        if ($request->filled('image_name')) {
            $path = 'rooms/' . $request->image_name;
        }

        $payload = [
            'service_name' => $request->service_name,
            'price'        => $request->price,
            'description'  => $request->description,
            'icon_url'     => $path,
        ];

        ApprovalRequest::create([
            'model_type'  => VillaService::class,
            'model_id'    => $id,
            'action_type' => 'update',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('success', '🔄 Permohonan modifikasi spesifikasi kamar berhasil dikirim ke Owner!');
    }

    /**
     * 6. Menghapus Data Kamar Beserta Berkas Gambar via Approval Owner
     */
    public function destroy($id)
    {
        $room = VillaService::findOrFail($id);

        $payload = [
            'service_name' => $room->service_name,
            'price'        => $room->price,
            'description'  => $room->description,
            'icon_url'     => $room->icon_url,
        ];

        ApprovalRequest::create([
            'model_type'  => VillaService::class,
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('success', '🚀 Pengajuan penghapusan data kamar berhasil dikirim ke Owner!');
    }
}
