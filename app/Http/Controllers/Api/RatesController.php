<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;

class RatesController extends Controller
{
    public function __invoke()
    {
        return Rate::cache(function($rate) {
            return $rate->orderBy('order', 'asc')->get();
        });
    }
}
