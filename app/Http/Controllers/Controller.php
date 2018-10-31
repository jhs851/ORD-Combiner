<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return string
     */
    public function redirectTo() : string
    {
        flash(auth()->user()->name . '님, 환영합니다.', 'success');

        return route('home');
    }

    /**
     * @param string $message
     * @param string|null $redirect
     * @param string $level
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function toRespond(string $message, string $redirect = null, string $level = 'success')
    {
        flash($message, $level);

        return redirect($redirect ?: route('home'));
    }

    /**
     * @param string $message
     * @param string $input
     * @param string $level
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function backwardsWithOnlyInput(string $message, string $input = 'email', $level = 'error')
    {
        flash($message, $level);

        return back()->onlyInput($input);
    }
}
