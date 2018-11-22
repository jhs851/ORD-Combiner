<?php

use App\Models\Version;

if (! function_exists('isIntro')) {
    function isIntro() : bool
    {
        return auth()->guest() || ! auth()->user()->hasVerifiedEmail();
    }
}

if (! function_exists('version')) {
    function version(string $version = null) : ?Version
    {
        return $version
            ? Version::setVersion($version)
            : Version::getVersion();
    }
}

if (! function_exists('currentUrl')) {
    function currentUrl() : string
    {
        if (! request()->has('return')) return request()->fullUrl();

        return sprintf(
            '%s?%s',
            request()->url(),
            http_build_query(request()->except('return'))
        );
    }
}
