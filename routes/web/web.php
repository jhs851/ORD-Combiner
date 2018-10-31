<?php

Route::get('/home', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

/*Route::get('info', function() {
    return response()->json(phpinfo());
});*/

/*DB::listen(function($query) {
    var_dump($query->sql);
});*/
