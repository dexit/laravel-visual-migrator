<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exception\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        // List of exception classes you don't want to report
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
        // Custom reporting logic can be added here
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
        // Custom response handling can be added here
    }
}