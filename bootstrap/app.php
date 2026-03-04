<?php

use App\Http\Kernel;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;

require __DIR__.'/../vendor/autoload.php';
$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)\n);

// Bind the core services into the container.
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Kernel::class
);

// Register middleware
$app->middleware([
    SetCacheHeaders::class,
]);

// Register route middleware
$app->routeMiddleware([
    'auth' => Authenticate::class,
    'bindings' => SubstituteBindings::class,
]);

return $app;