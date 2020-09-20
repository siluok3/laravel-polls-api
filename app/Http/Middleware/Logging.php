<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Logging
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug($request->method());

        return $next($request);
    }

    public function terminate(Request $request, $response)
    {
        Log::debug($response->status());
    }
}
