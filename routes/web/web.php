<?php

Route::get('/combiner', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/version', [
    'as'   => 'version',
    'uses' => 'HomeController@version',
]);

/*Route::get('info', function() {
    return response()->json(phpinfo());
});*/

/*DB::listen(function($query) {
    var_dump($query->sql);
});*/
