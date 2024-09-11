<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
            'auth' => \App\Http\Middleware\Auth::class,
            'admin' => \App\Http\Middleware\Admin::class,
            
    ];

    protected $middlewareGroups = [
            'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
    

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\Admin::class,
        'auth' => \App\Http\Middleware\Auth::class,
    ];
}