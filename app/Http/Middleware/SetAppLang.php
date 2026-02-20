<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetAppLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Try to detect locale from URL segments (first or second segment),
        // fall back to configured default locale if none found or invalid.
        // $available = config('app.available_locales', []);

        // $locale = $request->segment(1) ?: $request->segment(2);

        // if ($locale && in_array($locale, (array) $available)) {
        //     App::setLocale($locale);
        // } else {
        //     App::setLocale(config('app.locale'));
        // }

        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
