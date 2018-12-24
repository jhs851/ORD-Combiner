<?php

namespace App\Http\Controllers\Api;

use App\Models\Version;
use App\Http\Controllers\Controller;

class VersionsController extends Controller
{
    public function __invoke()
    {
        $method = request()->has('page') ? 'paginate' : 'get';

        return Version::$method(request()->has('page') ? 10 : null);
    }
}
