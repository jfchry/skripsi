<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Memproses penyimpanan pesan / pertanyaan dari pengunjung website
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form (Nama & Pesan wajib, Email & WhatsApp opsional/nullable)
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // 2. Insert ke Database menggunakan nama kolom asli tabel MySQL kamu
        // 2. Insert ke Database dengan pengaman string kosong jika data NULL
        Inquiry::create([
            'visitor_name' => $request->name,
            'email'        => $request->email ?? '',        // 🌟 JIKA KOSONG, PAKSA JADI STRING KOSONG
            'phone_number' => $request->phone ?? '',        // 🌟 JIKA KOSONG, PAKSA JADI STRING KOSONG
            'message'      => $request->message,
        ]);

        // 3. Kembali ke halaman utama dengan notifikasi sukses
        return redirect()->back()->with('success', '✉️ Pesan atau pertanyaan Anda berhasil terkirim!');
    }
}
