<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" {!! isIntro() ? 'class="intro"' : '' !!}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    {{-- Chrome, Firefox OS and Opera --}}
    <meta name="theme-color" content="#000000">
    {{-- Windows Phone --}}
    <meta name="msapplication-navbutton-color" content="#000000">
    {{-- iOS Safari --}}
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    {{-- SEO --}}
    <meta name="description" content="{{ config('app.description') }}">

    {{-- Facebook Meta --}}
    <meta property="og:title" content="@appName">
    <meta property="og:image" content="{{ asset('images/etc/og.jpg') }}">
    <meta property="og:type" content="Website">
    <meta property="og:author" content="@appName">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:description" content="{{ config('app.description') }}">

    {{-- Google Meta --}}
    <meta itemprop="name" content="@appName">
    <meta itemprop="description" content="{{ config('app.description') }}">
    <meta itemprop="image" content="{{ asset('images/etc/og.jpg') }}">
    <meta itemprop="author" content="@appName">

    {{--  Twitter Meta --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="@appName">
    <meta name="twitter:description" content="{{ config('app.description') }}">
    <meta name="twitter:image" content="{{ asset('images/etc/og.jpg') }}">
    <meta name="twitter:domain" content="{{ config('app.url') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>@appName</title>

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('style')

    <style>
        /**
         *  Dark Theme
         */

        body .wrap .view {
            color: white;
            background: url('/images/etc/background.jpg') center center / cover no-repeat fixed;
        }

        body .wrap .view .md-form label,
        body .wrap .view .md-form input {
            color: white;
        }

        .background-gradient {
            background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%);
            background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%)));
            background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%);
        }

        .card {
            background-color: rgba(100, 100, 100, 0.2);
        }

        .characteristics button {
            color: white !important;
        }

        .list-group-item {
            background-color: rgba(71, 51, 51, .8);
            border-color: rgba(255, 255, 255, .5);
        }

        .ongoing {
            background-color: #19c315;
        }

        .ready {
            background-color: #3872ff;
        }

        .modal-content {
            background-color: black;
        }

        .close {
            color: white;
        }
    </style>
</head>

<body>
    <div id="app" class="wrap">
        <div class="view">
            <div class="mask background-gradient d-flex justify-content-center align-items-center">
                @yield('into-mask-content')
            </div>

            @yield('content')
        </div>

        @include('layouts.partial.footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- Flash messages --}}
    @include('flash::message')

    @yield('script')
</body>
</html>
