<?php

namespace App\\Http;

use Illuminate\\Foundation\\Http\\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // Global Middleware
        \App\\Http\\Middleware\\CheckForMaintenanceMode::class,
        \Illuminate\\Cookie\\Middleware\\AddQueuedCookies::class,
        \Illuminate\\Session\\Middleware\\StartSession::class,
        \Illuminate\\View\\Middleware\\ShareErrorsFromSession::class,
        \Illuminate\\Routing\\Middleware\\SubstituteBindings::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\\Http\\Middleware\\Authenticate::class,
        'auth.basic' => \Illuminate\\Auth\\Middleware\\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\\Routing\\Middleware\\Binding::class,
        'can' => \Illuminate\\Auth\\Middleware\\Authorize::class,
        'guest' => \App\\Http\\Middleware\\RedirectIfAuthenticated::class,
    ];

    /**
     * The priority-sorted list of middleware aliases.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \App\\Http\\Middleware\\Authenticate::class,
        \App\\Http\\Middleware\\RedirectIfAuthenticated::class,
        \Illuminate\\Session\\Middleware\\StartSession::class,
        \Illuminate\\View\\Middleware\\ShareErrorsFromSession::class,
        \Illuminate\\Routing\\Middleware\\SubstituteBindings::class,
    ];
}