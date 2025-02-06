<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isAuth = Auth::check();

        // If user in login page but not has auth
        if (!$isAuth && $request->route()->named('admin.login')) {
            return $next($request);
        }

        // If user in admin area but not has auth
        if (!$isAuth && !$request->route()->named(['admin.login', 'admin.authorization']) && Str::startsWith($request->route()->getName(), 'admin.')) {
            return redirect()->route('admin.login');
        }

        // If user inn login page but has auth
        if ($isAuth && $request->route()->named('admin.login')) {

            return redirect()->route('admin.dashboard.index');
        }


        return $next($request);
    }
}
