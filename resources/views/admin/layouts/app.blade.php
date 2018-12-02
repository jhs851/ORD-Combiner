<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    {{-- Authenticate --}}
    <meta name="auth" content="{{ auth()->check() }}">
    @auth <meta name="user" content="{{ auth()->user()->load('loads') }}"> @endauth

    {{-- Chrome, Firefox OS and Opera --}}
    <meta name="theme-color" content="#000000">
    {{-- Windows Phone --}}
    <meta name="msapplication-navbutton-color" content="#000000">
    {{-- iOS Safari --}}
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>@appName</title>

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('style')
</head>

<body @auth class="sidenav-body" @endauth>
    <div id="app" class="wrap">
        @auth
            @include('admin.layouts.partial.navigation')
        @endauth

        @yield('content')

        @include('layouts.partial.footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- Flash messages --}}
    @include('flash::message')

    @yield('script')
</body>
</html>
