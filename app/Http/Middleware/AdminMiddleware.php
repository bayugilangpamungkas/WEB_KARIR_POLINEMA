<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah terautentikasi dan memiliki role admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect ke halaman utama jika bukan admin
        return redirect('/')->with('error', 'Anda tidak memiliki akses admin.');
    }
}
