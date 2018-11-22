<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Column;

class ColumnsController extends Controller
{
    public function __invoke()
    {
        return Column::orderBy('id', 'asc')->pluck('id');
    }
}
