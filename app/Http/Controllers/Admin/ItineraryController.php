<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItineraryController extends Controller
{
    public function index()
    {
        $itineraries = DB::table('content_pages')->where('type', 'itinerary')->get();
        return view('admin.itineraries.index', compact('itineraries'));
    }

    public function create()
    {
        return view('admin.itineraries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image_name' => 'required|string',
        ]);

        $path = 'itineraries/' . $request->image_name;

        $payload = [
            'title'     => $request->title,
            'slug'      => \Illuminate\Support\Str::slug($request->title),
            'body'      => $request->content,
            'image_url' => $path,
            'type'      => 'itinerary',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => null,
            'action_type' => 'create',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.itineraries.index')
            ->with('success', '🚀 Pengajuan Itinerary baru berhasil dikirim ke Owner!');
    }

    public function edit($id)
    {
        $itinerary = DB::table('content_pages')->where('id', $id)->first();
        return view('admin.itineraries.edit', compact('itinerary'));
    }

    public function update(Request $request, $id)
    {
        $itinerary = DB::table('content_pages')->where('id', $id)->first();

        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'image_name' => 'nullable|string',
        ]);

        $path = $itinerary->image_url ?? $itinerary->image ?? 'itineraries/default.png';
        if ($request->filled('image_name')) {
            $path = 'itineraries/' . $request->image_name;
        }

        $payload = [
            'title'     => $request->title,
            'slug'      => \Illuminate\Support\Str::slug($request->title),
            'body'      => $request->content,
            'image_url' => $path,
            'type'      => 'itinerary',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => $id,
            'action_type' => 'update',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.itineraries.index')
            ->with('success', '🔄 Permohonan modifikasi Itinerary berhasil dikirim ke Owner!');
    }

    public function destroy($id)
    {
        $itinerary = DB::table('content_pages')->where('id', $id)->first();

        $payload = [
            'title'     => $itinerary->title,
            'slug'      => $itinerary->slug ?? \Illuminate\Support\Str::slug($itinerary->title),
            'body'      => $itinerary->body ?? '',
            'image_url' => $itinerary->image_url ?? 'itineraries/default.png',
            'type'      => 'itinerary',
        ];

        ApprovalRequest::create([
            'model_type'  => 'App\Models\ContentPage',
            'model_id'    => $id,
            'action_type' => 'delete',
            'payload'     => $payload,
            'user_id'     => Auth::id(),
            'status'      => 'pending'
        ]);

        return redirect()->route('admin.itineraries.index')
            ->with('success', '🚀 Pengajuan penghapusan Itinerary berhasil dikirim ke Owner!');
    }
}
