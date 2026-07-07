<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function loginForm()
    {
        return view('auth.login');
    }

    // 2. Proses Validasi Akun (Disesuaikan dengan multi-role: Admin & Owner)
    public function loginProcess(Request $request)
    {
        // Validasi inputan login (menerima 'username', bukan 'email')
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Proses pencocokan username dan password ke database
        if (Auth::attempt($credentials)) {
            // Jika cocok, buat ulang session untuk mencegah session fixation attack
            $request->session()->regenerate();

            // 🌟 SELEKSI UTAMA: Alihkan jalur berdasarkan role user yang berhasil login
            if (Auth::user()->role === 'owner') {
                // Jika Owner yang login, arahkan ke dashboard persetujuan data owner
                return redirect()->route('owner.dashboard')->with('success', 'Selamat Datang Kembali, Owner!');
            }

            // Jika Admin yang login, arahkan ke halaman dashboard admin seperti semula
            return redirect()->intended('admin/dashboard');
        }

        // Jika salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    // 3. Proses Keluar Sistem (Logout)
    public function logout(Request $request)
    {
        // Hapus session autentikasi
        Auth::logout();

        // Hancurkan session lama dan buat ulang token CSRF demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}