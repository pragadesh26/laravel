<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Routes to exclude from CSRF verification.
     */
    protected $except = [
        'api/*', // ✅ Skip CSRF for all API routes like /api/login
    ];
}
