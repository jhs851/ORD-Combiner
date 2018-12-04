<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            flash('이미 로그인 하셨습니다.', 'warning');

            return redirect($this->redirectTo($request));
        }

        return $next($request);
    }

    /**
     * @param $request
     * @return string
     */
    protected function redirectTo($request) : string
    {
        return str_contains($request->path(), 'admin')
            ? route('admin.versions.index')
            : route('home');
    }
}
