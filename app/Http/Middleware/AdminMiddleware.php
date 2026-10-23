<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        // Being logged in is not enough: only accounts with the admin role may use the admin area.
        abort_unless(auth()->user()->role === 'admin', 403);

        return $next($request);
    }
}
