<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin {
    public function handle(Request $request, Closure $next) {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'غير مصرح لك بالوصول');
        }
        return $next($request);
    }
}

// Remove the user creation code from here
