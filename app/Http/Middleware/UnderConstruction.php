<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnderConstruction
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        // Allow every logged-in user.
        if (auth()->check()) {
            return $next($request);
        }

        // Allow visitors to reach authentication pages.
        if (
            $request->is('login') ||
            $request->is('logout') ||
            $request->is('admin')
        ) {
            return $next($request);
        }

        // Show construction page to guests.
        return response()
            ->view('under-construction', [], 503)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->header('Retry-After', '3600');
    }
}