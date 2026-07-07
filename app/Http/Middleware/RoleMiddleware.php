<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Jika user belum login atau rolenya tidak sesuai dengan yang diminta rute, tendang keluar
        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'Maaf, Anda tidak memiliki hak akses untuk halaman ini.');
        }

        return $next($request);
    }
}