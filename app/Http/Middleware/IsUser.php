<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        $allowedRoles = ['user']; // Role yang diperbolehkan

        if (Auth::check() && in_array(Auth::user()->role, $allowedRoles)) {
            return $next($request);
        }

        return redirect('/login-user')->with('error', 'Akses ditolak');
    }
}
