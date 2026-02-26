<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // If the current route is part of the website route group (named with "website.")
        // redirect to the website login route so unauthenticated website users land
        // on the site login page instead of the admin/login route.
        $route = $request->route();
        $routeName = $route ? $route->getName() : null;

        if ($routeName && str_starts_with($routeName, 'website.')) {
            return route('website.login');
        }

        // If the URL is under admin prefix, keep default admin login route
        if ($request->is('admin/*') or $request->is('admin')) {
            return route('login');
        }

        // Fallback to website login for other web routes
        return route('website.login');
    }
}
