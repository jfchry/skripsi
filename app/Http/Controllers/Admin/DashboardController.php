<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillaService; // Model Kamar/Layanan Villa
use App\Models\Inquiry;      // Model Pesan Masuk baru kita
use Illuminate\Support\Facades\DB; // Untuk menghitung data destinasi jika tidak ada modelnya

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung jumlah baris data asli dari masing-masing tabel database
        $totalDestinations = DB::table('destinations')->count(); // Sesuaikan nama tabel destinasimu jika berbeda
        $totalRooms        = VillaService::count();
        $totalMessages     = Inquiry::count();

        // 2. Kirim ketiga variabel angka tersebut ke view dashboard utama
        return view('admin.dashboard', compact('totalDestinations', 'totalRooms', 'totalMessages'));
    }
}
