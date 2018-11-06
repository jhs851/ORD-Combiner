<?php

namespace App\Http\Middleware;

use Closure;

class OnlyJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! request()->ajax() && ! request()->expectsJson()) {
            return abort(404);
        }

        return $next($request);
    }
}
