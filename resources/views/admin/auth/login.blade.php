@extends('admin.layouts.app')

@section('style')
    <style>
        html,
        body,
        .wrap,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 100vh;
            }
        }

        .md-form .fa {
            color: white;
        }

        .brown-gradient {
            background: linear-gradient(45deg, hsla(16, 15%, 56%, .8), rgba(31, 9, 3, .8)) repeat-x;
        }
    </style>
@stop

@section('content')
    <div class="view" style="background: url('/images/admin/sessions/background.jpg') center center / cover no-repeat;">
        <div class="mask brown-gradient d-flex justify-content-center align-items-center flex-column">
            <div class="container">
                <div class="row">
                    <div class="col-14 text-center wow animated fadeInDown" data-wow-delay="0.3s">
                        <h3 class="white-text">
                            @appName
                        </h3>
                    </div>

                    <div class="col-md-6 offset-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                        <div class="mt-2 px-4 py-3 z-depth-1 rounded" style="background-color: rgba(255, 255, 255, .6);">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf

                                <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
                                    <label for="email">Your email</label>
                                    {!! $errors->first('email', '<small id="emailHelpBlock" class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                    <i class="fa fa-unlock-alt prefix"></i>
                                    <input id="password" class="form-control" type="password" name="password" aria-describedby="passwordHelpBlock" value="{{ old('password') }}">
                                    <label for="password">Your password</label>
                                    {!! $errors->first('password', '<small id="passwordHelpBlock" class="form-text text-danger">:message</small>') !!}
                                </div>

                                <div class="checkbox-field">
                                    <input type="checkbox" name="remember" id="remember" value="{{ old('remember', 1) }}" checked>
                                    <label for="remember">
                                        로그인 기억하기
                                        <small class="text-danger">(공용 컴퓨터에서는 사용하지 마세요.)</small>
                                    </label>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-brown" type="submit">
                                        <i class="fa fa-user left"></i> Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
