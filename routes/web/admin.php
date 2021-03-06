<?php

$this->prefix('/admin')->namespace('Admin')->name('admin.')->group(function() {
    $this->namespace('Auth')->group(function() {
        $this->get('/', 'LoginController@showLoginForm')->name('login');
        $this->post('/', 'LoginController@login');
        $this->get('/logout', 'LoginController@logout')->name('logout');
    });

    $this->middleware('admin')->group(function() {
        // 버전
        $this->put('versions/deletes', 'VersionsController@deletes');
        $this->resource('versions', 'VersionsController')->except(['create', 'show', 'edit']);

        // 등급
        $this->put('rates/{rate}/order', 'RatesController@order');
        $this->resource('rates', 'RatesController')->except(['create', 'show', 'edit']);

        // 유닛
        $this->put('units/{unit}/order', 'UnitsController@order');
        $this->post('units/{unit}', 'UnitsController@update')->name('units.update');
        $this->resource('units', 'UnitsController')->except(['create', 'show', 'edit', 'update']);

        // 조합
        $this->resource('formulas', 'FormulasController')->except(['create', 'show', 'edit']);

        // 특성
        $this->resource('characteristics', 'CharacteristicsController')->except(['create', 'show', 'edit']);

        // 회원
        $this->put('users/deletes', 'UsersController@deletes');
        $this->resource('users', 'UsersController')->except(['create', 'store', 'show']);

        // 아바타
        $this->post('avatars/{avatar}', 'AvatarsController@update')->name('avatars.update');
        $this->resource('avatars', 'AvatarsController')->except(['create', 'show', 'edit', 'update']);
    });
});
