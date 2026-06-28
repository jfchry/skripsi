<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Diimpor untuk membuat slug otomatis

class ContentPageController extends Controller
{
    /**
     * =========================================================================
     * BAGIAN 1: CRUD TRAVEL GUIDES (PANDUAN WISATA)
     * =========================================================================
     */

    /**
     * Menampilkan Semua Data Panduan (Guides)
     */
    public function indexGuides()
    {
        $guides = ContentPage::where('type', 'guide')
                             ->orderBy('created_at', 'desc')
                             ->get();

        return view('admin.guides.index', compact('guides'));
    }

    /**
     * Form Tambah Panduan Baru
     */
    public function createGuide()
    {
        return view('admin.guides.create');
    }

    /**
     * Memproses Penyimpanan Data Panduan
     */
    public function storeGuide(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string',
            'status'    => 'required|in:published,draft',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $path = null;
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('guides', 'public');
        }

        ContentPage::create([
            'author_id' => auth()->id() ?? 1,
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'type'      => 'guide',
            'excerpt'   => $request->excerpt,
            'body'      => $request->content,
            'status'    => $request->status,
            'image_url' => $path,
        ]);

        return redirect()->route('admin.guides.index')->with('success', 'Panduan travel baru berhasil diterbitkan!');
    }

    /**
     * Form Edit Panduan
     */
    public function editGuide($id)
    {
        $guide = ContentPage::where('type', 'guide')->findOrFail($id);
        return view('admin.guides.edit', compact('guide'));
    }

    /**
     * Memproses Pembaruan Data Panduan
     */
    public function updateGuide(Request $request, $id)
    {
        $guide = ContentPage::where('type', 'guide')->findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string',
            'status'    => 'required|in:published,draft',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('image_url')) {
            if ($guide->image_url && Storage::disk('public')->exists($guide->image_url)) {
                Storage::disk('public')->delete($guide->image_url);
            }
            $guide->image_url = $request->file('image_url')->store('guides', 'public');
        }

        $guide->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body'    => $request->content,
            'status'  => $request->status,
        ]);

        return redirect()->route('admin.guides.index')->with('success', 'Data panduan berhasil diperbarui!');
    }

    /**
     * Menghapus Data Panduan
     */
    public function destroyGuide($id)
    {
        $guide = ContentPage::where('type', 'guide')->findOrFail($id);

        if ($guide->image_url && Storage::disk('public')->exists($guide->image_url)) {
            Storage::disk('public')->delete($guide->image_url);
        }

        $guide->delete();
        return redirect()->route('admin.guides.index')->with('success', 'Panduan berhasil dihapus dari sistem.');
    }


    /**
     * =========================================================================
     * BAGIAN 2: CRUD ITINERARIES (RENCANA PERJALANAN) - BARU 🌟
     * =========================================================================
     */

    /**
     * Menampilkan Semua Data Rencana Perjalanan (Itineraries)
     */
    public function indexItineraries()
    {
        // 🌟 DIKUNCI: Hanya menyaring konten yang murni bertipe 'itinerary'
        $itineraries = ContentPage::where('type', 'itinerary')
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('admin.itineraries.index', compact('itineraries'));
    }

    /**
     * Form Tambah Itinerary Baru
     */
    public function createItinerary()
    {
        return view('admin.itineraries.create');
    }

    /**
     * Memproses Penyimpanan Data Itinerary Baru
     */
    public function storeItinerary(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string', // Mengambil data input dari name="content"
            'status'    => 'required|in:published,draft',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $path = null;
        if ($request->hasFile('image_url')) {
            // Foto disimpan terpisah di dalam folder khusus itineraries
            $path = $request->file('image_url')->store('itineraries', 'public');
        }

        ContentPage::create([
            'author_id' => auth()->id() ?? 1,
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'type'      => 'itinerary', // 🌟 DIKUNCI otomatis sebagai jenis itinerary di database
            'excerpt'   => $request->excerpt,
            'body'      => $request->content, // Menuju kolom fisik 'body'
            'status'    => $request->status,
            'image_url' => $path,
        ]);

        return redirect()->route('admin.itineraries.index')->with('success', 'Rencana perjalanan (itinerary) baru berhasil diterbitkan!');
    }

    /**
     * Form Edit Data Itinerary
     */
    public function editItinerary($id)
    {
        $itinerary = ContentPage::where('type', 'itinerary')->findOrFail($id);
        return view('admin.itineraries.edit', compact('itinerary'));
    }

    /**
     * Memproses Pembaruan Data Itinerary
     */
    public function updateItinerary(Request $request, $id)
    {
        $itinerary = ContentPage::where('type', 'itinerary')->findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string',
            'status'    => 'required|in:published,draft',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus foto lama itinerary jika ada berkas baru yang diunggah
            if ($itinerary->image_url && Storage::disk('public')->exists($itinerary->image_url)) {
                Storage::disk('public')->delete($itinerary->image_url);
            }
            $itinerary->image_url = $request->file('image_url')->store('itineraries', 'public');
        }

        $itinerary->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body'    => $request->content, // Tetap sinkron ke kolom 'body'
            'status'  => $request->status,
        ]);

        return redirect()->route('admin.itineraries.index')->with('success', 'Data itinerary berhasil diperbarui!');
    }

    /**
     * Menghapus Data Itinerary secara Permanen
     */
    public function destroyItinerary($id)
    {
        $itinerary = ContentPage::where('type', 'itinerary')->findOrFail($id);

        if ($itinerary->image_url && Storage::disk('public')->exists($itinerary->image_url)) {
            Storage::disk('public')->delete($itinerary->image_url);
        }

        $itinerary->delete();
        return redirect()->route('admin.itineraries.index')->with('success', 'Itinerary berhasil dihapus dari sistem.');
    }
}
