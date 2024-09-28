<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    protected $routeMiddleware = [
        // เพิ่ม middleware ที่คุณต้องการที่นี่
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware สำหรับกลุ่ม web
        ],

        'api' => [
            // Middleware สำหรับกลุ่ม API
        ],
    ];
}
