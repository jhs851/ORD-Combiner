<?php

use App\{
    Column, Unit
};

Route::get('/', function () {
    $columns = Column::orderBy('id', 'asc')->with('rates')->get();
    $units = Unit::orderby('id', 'asc')->with('formulas')->get();

    return view('combiner', compact('columns', 'units'));
});
