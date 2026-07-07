<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillaService;
use App\Models\Inquiry;
use App\Models\ApprovalRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan Halaman Utama Dashboard Admin & Statistik Konten
     */
    public function index()
    {
        // Hitung statistik secara lengkap dari masing-masing tabel database
        $totalDestinations = DB::table('destinations')->count();
        $totalRooms        = VillaService::count();
        $totalMessages     = Inquiry::count();

        // Statistik untuk kategori Guides, Itineraries, dan Galleries
        $totalGuides       = DB::table('content_pages')->where('type', 'guide')->count();
        $totalItineraries  = DB::table('content_pages')->where('type', 'itinerary')->count();
        $totalGalleries    = DB::table('galleries')->count();

        // Ambil data notifikasi approval yang ditujukan ke user ini
        $notifications = ApprovalRequest::where('user_id', Auth::id())
            ->whereIn('status', ['approved', 'rejected'])
            ->where(function($query) {
                $query->where('is_seen', false)
                      ->orWhereNull('is_seen');
            })
            ->get();

        // Lempar semua data ke view dashboard
        return view('admin.dashboard', compact(
            'totalDestinations',
            'totalRooms',
            'totalMessages',
            'totalGuides',
            'totalItineraries',
            'totalGalleries',
            'notifications'
        ));
    }

    /**
     * 🌟 FIX ERROR: Mengabaikan dan menghapus pengajuan approval yang bermasalah / ditolak
     */
    public function dismissNotification($id)
    {
        // Cari data approval request berdasarkan ID, jika tidak ada langsung skip aman
        $approvalRequest = ApprovalRequest::findOrFail($id);

        // Hapus permanen baris pengajuan bermasalah ini dari tabel approval_requests
        $approvalRequest->delete();

        return redirect()->back()
            ->with('success', '🗑️ Riwayat pengajuan berhasil dibersihkan dari sistem!');
    }
}
