<?php

namespace App\Http\Middleware;

use Closure;
use Request;


class JsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set("Accept", "application/json");

        return $next($request);
    }

}
