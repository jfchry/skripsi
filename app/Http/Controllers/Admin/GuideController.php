<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuideController extends Controller
{
    public function index()
    {
        $guides = DB::table('content_pages')->where('type', 'guide')->get();
        return view('admin.guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image_name' => 'required|string',
        ]);

        $path = 'guides/' . $request->image_name;

        $payload = [
            'title'     => $request->title,
            'slug'      => \Illuminate\Support\Str::slug($request->title), // 🌟 TAMBAHKAN INI AGAR DATABASE PUAS
            'body'      => $request->content,
            'image_url' => $path,
            'type'      => 'guide',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.guides.index')
            ->with('success', '🚀 Pengajuan Travel Guide baru berhasil dikirim ke Owner!');
    }

    /**
     * 🌟 MENAMPILKAN FORM EDIT TRAVEL GUIDE
     */
    public function edit($id)
    {
        $guide = DB::table('content_pages')->where('id', $id)->first();
        return view('admin.guides.edit', compact('guide'));
    }

    public function update(Request $request, $id)
    {
        $guide = DB::table('content_pages')->where('id', $id)->first();

        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image_name' => 'nullable|string',
        ]);

        $path = $guide->image_url ?? $guide->image ?? 'guides/default.png';
        if ($request->filled('image_name')) {
            $path = 'guides/' . $request->image_name;
        }

        $payload = [
            'title'     => $request->title,
            'slug'      => \Illuminate\Support\Str::slug($request->title), // 🌟 TAMBAHKAN INI JUGA SAAT UPDATE
            'body'      => $request->content,
            'image_url' => $path,
            'type'      => 'guide',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => $id,
            'action_type' => 'update',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.guides.index')
            ->with('success', '🔄 Permohonan modifikasi Travel Guide berhasil dikirim ke Owner!');
    }

    public function destroy($id)
    {
        $guide = DB::table('content_pages')->where('id', $id)->first();

        // Mengambil teks dari kolom 'body' asli database kamu
        $textMain = $guide->body ?? '';

        $payload = [
            'title'       => $guide->title,
            'body'        => $textMain, // 🌟 Kirim ke DB menggunakan key 'body'
            'description' => $textMain, // Tetap bawa key ini untuk backup preview di halaman Owner jika dia panggil description
            'image_url'   => $guide->image_url ?? 'guides/default.png',
            'type'        => 'guide',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.guides.index')
            ->with('success', '🚀 Pengajuan penghapusan Travel Guide berhasil dikirim ke Owner!');
    }
}
