<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Middleware\MetaDataMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/admin/auth.php',
            __DIR__ . '/../routes/admin/web.php',
            __DIR__ . '/../routes/main/auth.php',
            __DIR__ . '/../routes/main/web.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
/*        $middleware->web(append: [
            MetaDataMiddleware::class
        ]);*/
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->view($request->is('admin/*') ? 'errors.admin.404' : 'errors.main.404', status: 404, data: [
                'status'  => '404',
                'message' => $e->getMessage(),
            ]);
        });
    })->create();
