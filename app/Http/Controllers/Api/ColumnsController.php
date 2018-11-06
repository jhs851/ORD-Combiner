<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Column;

class ColumnsController extends Controller
{
    public function __invoke()
    {
        return Column::cache(function($column) {
            return $column->orderBy('id', 'asc')->pluck('id');
        });
    }
}
