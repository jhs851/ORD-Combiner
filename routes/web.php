<?php

use App\{
    Column, Unit
};

Route::get('/', function () {
    $columns = Column::orderBy('id', 'asc')->with('rates')->get();
    $unitsCount = Unit::count();

    return view('combiner', compact('columns', 'unitsCount'));
});

Route::get('units/{unit}', function(Unit $unit) {
    return $unit->load('formulas');
});
