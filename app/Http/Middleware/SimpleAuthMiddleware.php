<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimpleAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has a logged-in user
        if (!session()->has('logged_in_user')) {
            return redirect()->route('login.form');
        }

        return $next($request);
    }
}
