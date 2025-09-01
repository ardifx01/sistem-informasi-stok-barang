<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Pakai di route: ->middleware('role:Admin')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Belum login ATAU rolenya tidak cocok → 403
        if (! $request->user() || $request->user()->role !== $role) {
            abort(403);
        }
        return $next($request);
    }
}
