<?php

// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
$this->get('/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
if (new App\Models\User instanceof Illuminate\Contracts\Auth\MustVerifyEmail) {
    $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    $this->get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    $this->get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
}

// Social routes...
Route::get('/social/{provider}', 'Auth\SocialController@execute')->name('social.login');

// Privacy and terms
Route::get('/privacy', function() { return view('auth.privacy'); })->name('privacy');
Route::get('/terms', function() { return view('auth.terms'); })->name('terms');
