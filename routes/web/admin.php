<?php

$this->prefix('/admin')->namespace('Admin')->name('admin.')->group(function() {
    $this->namespace('auth')->group(function() {
        $this->get('/', 'LoginController@showLoginForm')->name('login');
        $this->post('/', 'LoginController@login');
        $this->get('/logout', 'LoginController@logout')->name('logout');
    });

    $this->middleware('admin')->group(function() {
        // 등급
        $this->put('rates/{rate}/order', 'RatesController@order');
        $this->resource('rates', 'RatesController')->except(['create', 'show', 'edit']);

        // 유닛
        $this->put('units/{unit}/order', 'UnitsController@order');
        $this->post('units/{unit}', 'UnitsController@update')->name('units.update');
        $this->resource('units', 'UnitsController')->except(['create', 'show', 'edit', 'update']);
    });
});
