<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('loginuser');
        }

        $user = Auth::guard('web')->user();

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403);
    }
}