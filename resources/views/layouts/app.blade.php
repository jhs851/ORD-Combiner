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
    <meta name="description" content="{{ config('app.description') }}">

    {{-- Facebook Meta --}}
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:image" content="">
    <meta property="og:type" content="Website">
    <meta property="og:author" content="{{ config('app.name') }}">
    <meta property="og:url" content="{{ config('project.url') }}">
    <meta property="og:description" content="{{ config('app.description') }}">

    {{-- Google Meta --}}
    <meta itemprop="name" content="{{ config('app.name') }}">
    <meta itemprop="description" content="{{ config('app.description') }}">
    <meta itemprop="image" content="">
    <meta itemprop="author" content="{{ config('app.name') }}">

    {{--  Twitter Meta --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="{{ config('app.description') }}">
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="{{ config('project.url') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name') }}</title>

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/assets/bs3/css/bootstrap.min.css" type="text/css" class="thema-mode">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/colorset/Basic/colorset.css" type="text/css" class="thema-colorset">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/widget/basic-keyword/widget.css?ver=171013">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/skin/board/makeHelper/style.css">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/skin/board/makeHelper/css/view.makeHelper.css">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/skin/board/makeHelper/css/view.tool.css?reg=2018-05-26 10:20:51">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/skin/addon/sign-basic/widget.css">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/widget/basic-outlogin/widget.css?ver=171013">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/widget/basic-category/widget.css?ver=171013">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/widget/basic-post-list/widget.css?ver=171013">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/thema/Sions/widget/basic-sidebar/widget.css?ver=171013">--}}
    {{--<link rel="stylesheet" href="http://home.sions.kr/css/level/basic.css?ver=171013">--}}

    @yield('style')

    {{--<script src="http://home.sions.kr/js/jquery-1.11.3.min.js"></script>--}}
    {{--<script src="http://home.sions.kr/js/jquery-migrate-1.2.1.min.js"></script>--}}
    {{--<script src="/js/temp/common.js"></script>--}}
    {{--<script src="/js/temp/Template.js"></script>--}}
    {{--<script src="/js/temp/Rate.js"></script>--}}
    {{--<script src="/js/temp/Unit.js"></script>--}}
    {{--<script src="/js/temp/helpers.js"></script>--}}
    {{--<script src="/js/temp/tool.js"></script>--}}
</head>

<body class="responsive is-pc">
    <div id="app">
        @yield('content')
    </div>

    @include('layouts.partial.footer')

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('script')
</body>
</html>
