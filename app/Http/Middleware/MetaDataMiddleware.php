<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;

class MetaDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $metaData = Page::where('slug', Route::current()->uri())->first();

        view()->share('metaData', !is_null($metaData) ? $metaData->toArray() : []);

        return $next($request);
    }
}
