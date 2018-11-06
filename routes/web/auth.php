<?php

$this->namespace('Auth')->group(function() {
    // Authentication Routes...
    $this->get('/', 'LoginController@showLoginForm')->name('login');
    $this->post('/', 'LoginController@login');
    $this->get('/logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('/register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('/register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

    // Email Verification Routes...
    if (new App\Models\User instanceof Illuminate\Contracts\Auth\MustVerifyEmail) {
        $this->get('email/verify', 'VerificationController@show')->name('verification.notice');
        $this->get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        $this->get('email/resend', 'VerificationController@resend')->name('verification.resend');
    }

    // Social routes...
    $this->get('/social/{provider}', 'SocialController@execute')->name('social.login');

    // Privacy and terms
    $this->get('/privacy', function() { return view('auth.privacy'); })->name('privacy');
    $this->get('/terms', function() { return view('auth.terms'); })->name('terms');
});
