<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry; // 🌟 Panggil model baru
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // 🌟 Simpan menggunakan Model Eloquent dengan pemetaan kolom yang benar
        Inquiry::create([
            'visitor_name'      => $request->name,
            'email'             => $request->email,
            'phone_number'      => $request->phone,
            'service_requested' => 'General Inquiry', // Penanda asal pesan melayang
            'message'           => $request->message,
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim.');
    }
}
