<?php

$this->namespace('Api')->group(function() {
    $this->get('/users/{user}/loads', 'LoadsController@index')->name('api.loads.index');
    $this->get('/users/{user}/loads/next', 'LoadsController@next');

    $this->get('/versions', 'VersionsController')->name('api.versions.index');

    Route::prefix('admin')->group(function() {
        $this->get('columns', 'ColumnsController');

        $this->get('rates', 'RatesController');

        $this->get('formulas/{unit}', 'FormulasController');

        $this->get('users', 'UsersController')->name('api.admin.users.index');
    });
});
