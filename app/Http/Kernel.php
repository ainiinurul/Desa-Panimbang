<?php

namespace App\Http;


use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...kode lainnya tetap sama...

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // ...
        'role' => \App\Http\Middleware\CheckRole::class,
    ];
}