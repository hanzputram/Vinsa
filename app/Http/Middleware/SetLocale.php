<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasSession()) {
            // Force reset to 'id' for sessions that haven't been updated yet
            if (!Session::has('locale_default_v2')) {
                Session::put('locale', 'id');
                Session::put('locale_default_v2', true);
            }
            App::setLocale(Session::get('locale', 'id'));
        } else {
            App::setLocale('id');
        }

        \Carbon\Carbon::setLocale(App::getLocale());

        return $next($request);
    }
}
