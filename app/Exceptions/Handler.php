<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AdministrationException::class,
        NotFoundVersionException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $exception
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function render($request, Exception $exception)
    {
        if (app()->environment() === 'testing') throw $exception;

        if ($exception instanceof AdministrationException) return $this->unadministrated($request, $exception);

        if ($exception instanceof NotFoundVersionException) return $this->notFoundVersion($request, $exception);

        return parent::render($request, $exception);
    }

    /**
     * Convert an administration exception into a response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AdministrationException  $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unadministrated($request, AdministrationException $exception)
    {
        return $this->respondException($request, $exception, 403, route('home'));
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request                 $request
     * @param  \Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $this->respondException($request, $exception, 401, route('login'), '로그인 후에 이용가능합니다.', 'warning');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception                $exception
     * @param int                      $status
     * @param string|null              $message
     * @param string                   $level
     * @param string|null              $redirect
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function respondException($request, Exception $exception, int $status = 500, string $redirect = null, string $message = '', string $level = 'error')
    {
        if ($request->expectsJson()) return response()->json(['message' => $exception->getMessage()], $status);

        flash($message ?: $exception->getMessage(), $level);

        return redirect()->guest($exception->redirectTo() ?? $redirect ?: route('home'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param NotFoundVersionException $exception
     * @param int                      $status
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function notFoundVersion($request, NotFoundVersionException $exception, int $status = 500)
    {
        $cookie = cookie()->forget('version');

        cookie()->queue($cookie);

        if ($request->expectsJson()) return response()->json(['message' => $exception->getMessage()], $status)->withCookie($cookie);

        flash($exception->getMessage(), 'error');

        return redirect($exception->redirectTo())->withCookie($cookie);
    }
}
