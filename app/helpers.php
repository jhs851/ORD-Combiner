<?php

if (! function_exists('appName')) {
    function appName() : string
    {
        return config('project.name.' . app()->getLocale());
    }
}

if (! function_exists('appDescription')) {
    function appDescription() : string
    {
        return config('project.description.' . app()->getLocale());
    }
}
