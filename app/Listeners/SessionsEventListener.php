<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class SessionsEventListener
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        tap($event->user, function($user) {
            $user->last_login = Carbon::now();

            $user->increment('visits');

            $user->save();
        });
    }
}
