<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\UserNotFoundException;
use Illuminate\Http\Request; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (UserNotFoundException $e, Request $request) {
            return response()->view('errors.notfound', ['message' => $e->getMessage()], status: 500);
        });
        $exceptions->render(function (ProductNotFoundException $e, Request $request) {
            return response()->view('errors.notfound', ['message' => $e->getMessage()], status: 500);
        });
    })->create();
