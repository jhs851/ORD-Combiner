<?php

use App\Models\{Characteristic, Column, Unit};

Route::get('/', function () {
    $columns = cache()->rememberForever('8.4-columns', function() {
        return Column::orderBy('id', 'asc')->with('rates')->get();
    });

    $unitsCount = cache()->rememberForever('8.4-units-count', function() {
        return Unit::count();
    });

    $characteristics = cache()->rememberForever('8.4-characteristics', function() {
        return Characteristic::orderBy('id', 'asc')->get();
    });

    return view('combiner', compact('columns', 'unitsCount', 'characteristics'));
});

/*Route::get('info', function() {
    return response()->json(phpinfo());
});*/

/*DB::listen(function($query) {
    var_dump($query->sql);
});*/
