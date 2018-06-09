<?php

use App\{
    Column, Unit
};

Route::get('/', function () {
    $columns = cache()->rememberForever('8.4-columns', function() {
        return Column::orderBy('id', 'asc')->with('rates')->get();
    });
    $unitsCount = cache()->rememberForever('8.4-units-count', function() {
        return Unit::count();
    });

    return view('combiner', compact('columns', 'unitsCount'));
});

/*Route::get('info', function() {
    return response()->json(phpinfo());
});*/

/*DB::listen(function($query) {
    var_dump($query->sql);
});*/
