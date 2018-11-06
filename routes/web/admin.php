<?php

$this->prefix('/admin')->namespace('Admin')->name('admin.')->group(function() {
    $this->namespace('auth')->group(function() {
        $this->get('/', 'LoginController@showLoginForm')->name('login');
        $this->post('/', 'LoginController@login');
        $this->get('/logout', 'LoginController@logout')->name('logout');
    });

    $this->middleware('admin')->group(function() {
        $this->put('rates/{rate}/order', 'RatesController@order');
        $this->resource('rates', 'RatesController')->except(['create', 'show', 'edit']);
    });
});
