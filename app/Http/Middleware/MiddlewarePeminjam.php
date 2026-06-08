<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MiddlewarePeminjam
{
    public function handle(Request $request, Closure $next)
    {
        // cek login peminjam via guard
        if (!auth('peminjam')->check()) {
            return redirect()
                ->route('login.peminjam')
                ->with('error', 'Silakan login sebagai peminjam');
        }

        return $next($request);
    }
}