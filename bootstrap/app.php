<?php

use App\Http\Middleware\AuthGuest;
use App\Http\Middleware\AuthTokenVerify;
use App\Http\Middleware\UserPermission;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authToken' => AuthTokenVerify::class,
            'authGuest' => AuthGuest::class,
            'userPermission' => UserPermission::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
