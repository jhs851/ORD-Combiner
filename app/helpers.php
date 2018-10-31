<?php

if (! function_exists('isIntro')) {
    function isIntro() : bool
    {
        return auth()->guest() || ! auth()->user()->hasVerifiedEmail();
    }
}
