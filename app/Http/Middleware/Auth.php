<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Auth extends Middleware
{
    protected $redirectTo;

    protected function redirectTo(Request $request)
    {
        return $request->expectsJson() ? null :route('login');
    }
}
