<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Http\Controllers\Controller;

class FormulasController extends Controller
{
    public function __invoke(int $targetId)
    {
        return Unit::cache(function($unit) use ($targetId) {
            return $unit->possibleFormulas($targetId)->get()->groupBy('rate_id');
        }, ".{$targetId}");
    }
}
