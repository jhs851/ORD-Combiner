<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" {!! isIntro() ? 'class="intro"' : '' !!}>
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

    @include('layouts.partial.theme')
</head>

<body>
    <div id="app" class="wrap">
        @unless (isset($type))
            <div class="view" style="padding-bottom: 60px;">
                <div class="mask background-gradient d-flex justify-content-center align-items-center">
                    @yield('content')
                </div>
            </div>
        @elseif ($type === 'combiner')
            <combiner-navigation-component :current-version="{{ json_encode(version()) }}" referer="{{ urlencode($currentUrl) }}"></combiner-navigation-component>

            <div class="view" style="padding-bottom: 60px;">
                <div class="mask background-gradient d-flex justify-content-center align-items-center"></div>

                @yield('content')
            </div>
        @elseif ($type === 'forum')
            @include('layouts.partial.navigation')

            @yield('content')
        @endunless

        @include('layouts.partial.footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- Flash messages --}}
    @include('flash::message')

    @yield('script')
</body>
</html>
