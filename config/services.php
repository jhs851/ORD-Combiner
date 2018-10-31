<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | 소셜 로그인 서비스 설정
    |--------------------------------------------------------------------------
    */

    'naver' => [
        'client_id'     => env('NAVER_ID'),
        'client_secret' => env('NAVER_SECRET'),
        'redirect'      => env('APP_URL') . env('NAVER_CALLBACK'),
    ],

    'kakao' => [
        'client_id'     => env('KAKAO_ID'),
        'client_secret' => env('KAKAO_SECRET'),
        'redirect'      => env('APP_URL') . env('NAVER_CALLBACK'),
    ],
];
