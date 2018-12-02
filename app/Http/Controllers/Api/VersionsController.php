<?php

namespace App\Http\Controllers\Api;

use App\Models\Version;
use App\Http\Controllers\Controller;

class VersionsController extends Controller
{
    public function __invoke()
    {
        return Version::cache(function($version) {
            return $version->get();
        });
    }
}
