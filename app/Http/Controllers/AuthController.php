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

    // 2. Proses Validasi Akun Admin (Disesuaikan dengan tabel users kustom)
    public function loginProcess(Request $request)
    {
        // Validasi inputan admin (sekarang menerima 'username', bukan 'email')
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Laravel secara default mencari kolom 'email'.
        // Karena databasemu menggunakan 'username', baris Auth::attempt ini otomatis menyesuaikannya.
        if (Auth::attempt($credentials)) {
            // Jika cocok, buat ulang session untuk keamanan
            $request->session()->regenerate();

            // Redirect langsung ke halaman dashboard admin
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
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
