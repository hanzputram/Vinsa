<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika URL adalah root domain (vinsa.fr)
        if ($request->is('/')) {
            Visit::create([
                'ip_address' => $request->ip(),
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}
