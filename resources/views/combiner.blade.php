<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    {{-- Chrome, Firefox OS and Opera --}}
    <meta name="theme-color" content="">
    {{-- Windows Phone --}}
    <meta name="msapplication-navbutton-color" content="">
    {{-- iOS Safari --}}
    <meta name="apple-mobile-web-app-status-bar-style" content="">

    {{-- SEO --}}
    <meta name="description" content="{{ appDescription() }}">

    {{-- Facebook Meta --}}
    <meta property="og:title" content="{{ appName() }}">
    <meta property="og:image" content="">
    <meta property="og:type" content="Website">
    <meta property="og:author" content="{{ appName() }}">
    <meta property="og:url" content="{{ config('project.url') }}">
    <meta property="og:description" content="{{ appDescription() }}">

    {{-- Google Meta --}}
    <meta itemprop="name" content="{{ appName() }}">
    <meta itemprop="description" content="{{ appDescription() }}">
    <meta itemprop="image" content="">
    <meta itemprop="author" content="{{ appName() }}">

    {{--  Twitter Meta --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="{{ appName() }}">
    <meta name="twitter:description" content="{{ appDescription() }}">
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="{{ config('project.url') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ appName() }}</title>

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('style')
</head>

<body>
    <div id="app" class="wrap">
        @yield('content')
    </div>

    @include('layouts.partial.footer')

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- Flassh message --}}
    @include('flash::message')

    @yield('script')
</body>
</html>