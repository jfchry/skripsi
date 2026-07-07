<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;
use App\Models\Destination;
use App\Models\Gallery;
use App\Models\VillaService;

class HomeController extends Controller
{
    /**
     * 1. Halaman Utama / Landing Page
     * Memuat 2 jenis galeri yang terisolasi aman
     */
    public function index()
    {
        // Jalur Galeri Atas: parent_type 'destination' dan parent_id BUKAN 999
        $experience_galleries = Gallery::where('parent_type', 'destination')
                                       ->where('parent_id', '!=', 999)
                                       ->orderBy('created_at', 'desc')
                                       ->get();

        // 🌟 JALUR GALERI BAWAH (Discover More): parent_type 'destination' tapi parent_id nya 999
        $discover_galleries = Gallery::where('parent_type', 'destination')
                                     ->where('parent_id', 999)
                                     ->orderBy('created_at', 'desc')
                                     ->latest()
                                     ->take(6)
                                     ->get();

        // 🌟 FIX: Menghapus status published agar data buatan admin langsung muncul di home
        $guides = ContentPage::where('type', 'guide')
                             ->orderBy('created_at', 'desc')
                             ->take(3)
                             ->get();

        return view('frontend.home', compact('experience_galleries', 'discover_galleries', 'guides'));
    }

    /**
     * 2. Halaman Daftar Destinasi Wisata
     */
    public function destinations()
    {
        $destinations = Destination::all();
        return view('frontend.destinations', compact('destinations'));
    }

    /**
     * 3. Halaman Detail Destinasi Wisata
     */
    public function destinationDetail($id)
    {
        $destination = Destination::findOrFail($id);
        return view('frontend.destination-detail', compact('destination'));
    }

    /**
     * 4. Halaman Daftar Travel Guides
     */
    public function guides()
    {
        // 🌟 FIX: Menghapus status published untuk halaman list guides
        $guides = ContentPage::where('type', 'guide')
                             ->orderBy('created_at', 'desc')
                             ->get();
        return view('frontend.guides', compact('guides'));
    }

    /**
     * 5. Halaman Daftar Itinerary
     */
    public function itineraries()
    {
        // 🌟 FIX: Menghapus status published untuk halaman list itineraries
        $itineraries = ContentPage::where('type', 'itinerary')
                                   ->orderBy('created_at', 'desc')
                                   ->get();
        return view('frontend.itineraries', compact('itineraries'));
    }

    /**
     * 6. Halaman Detail Itinerary
     */
    public function itineraryDetail($id)
    {
        // 🌟 FIX: Menghapus status published agar detail itinerary tidak 404 Not Found
        $itinerary = ContentPage::where('type', 'itinerary')
                                 ->findOrFail($id);
        return view('frontend.itinerary-detail', compact('itinerary'));
    }

    /**
     * 7. Halaman Informasi Villa
     * Memuat 1 jenis galeri murni khusus akomodasi & fasilitas internal
     */
    public function villa()
    {
        $room_services = VillaService::orderBy('price', 'desc')->get();

        // 🌟 Jalur Galeri 3: Murni hanya mengambil aset internal ecoresort
        $villa_galleries = Gallery::where('parent_type', 'villa_service')
                                  ->orderBy('created_at', 'desc')
                                  ->get();

        return view('frontend.villa', compact('room_services', 'villa_galleries'));
    }
}
