<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpHeaders
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $text = '')
    {
        $response = $next($request);
        $response->header('X-JOBS', $text);

        return $response;
    }
}
