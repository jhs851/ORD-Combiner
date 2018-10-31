@extends('layouts.app')

@section('style')
    <style>
        .intro-gradient {
            background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%);
            background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%)));
            background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4) 100%);
        }

        .card {
            background-color: rgba(100, 100, 100, 0.2);
        }
    </style>
@stop

@section('content')
    <div class="view">
        <div class="mask intro-gradient d-flex justify-content-center align-items-center">
            @yield('intro-content')
        </div>
    </div>
@endsection
