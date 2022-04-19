<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;

class Cors
{
    protected $accepted = [
        'http://localhost:8080',
        'http://localhost:8282',
    ];

    public function handle(Request $request, Closure $next)
    {
		return $next($request);
        if (in_array($request->header('origin'), $this->accepted)) {
            return $next($request);
        }

        throw new SuspiciousOperationException('Your host not allow.');
    }
}
