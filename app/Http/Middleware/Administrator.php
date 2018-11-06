<?php

namespace App\Http\Middleware;

use App\Exceptions\AdministrationException;
use Closure;
use Illuminate\Auth\Middleware\Authenticate;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        return app(Authenticate::class)->handle($request, function($request) use ($next) {
            if (! $request->user()->isAdmin()) throw new AdministrationException(
                '권한이 없습니다.',
                $this->redirectTo($request)
            );

            return $next($request);
        });
    }

    /**
     * @param $request
     * @return string
     */
    protected function redirectTo($request)
    {
        auth()->logout();

        $request->session()->invalidate();

        return route('admin.login');
    }
}
