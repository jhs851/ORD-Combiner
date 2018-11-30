@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-1 text-center text-md-left d-flex flex-column justify-content-center wow fadeInLeft animated" data-wow-delay="0.3s">
                <h1 class="h1-responsive mb-0">
                    @appName
                </h1>
                <hr class="hr-light w-100 mt-1">
                <h6>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis dolor dolores eaque et fugit in iste labore minus nam neque nihil possimus vero vitae, voluptatem! Consequuntur dignissimos recusandae suscipit?
                </h6>
            </div>

            <div class="col-md-5 wow fadeInRight animated" data-wow-delay="0.3s">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="text-center">
                                <h3>
                                    <i class="fa fa-user"></i> Login:
                                </h3>

                                <hr class="hr-light">
                            </div>

                            <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
                                <label for="email">Your email</label>
                                {!! $errors->first('email', '<small id="emailHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                <i class="fa fa-lock prefix"></i>
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
                                <button type="submit" class="btn btn-indigo">Login</button>

                                <p class="mt-2 mb-1">
                                    회원이 아니라면? <a href="{{ route('register') }}">가입하세요.</a>
                                </p>

                                <p class="mb-0">
                                    <a href="{{ route('password.request') }}">비밀번호를 잊으셨나요?</a>
                                </p>

                                <hr class="hr-light mb-3 mt-4">

                                <div class="text-center d-flex justify-content-center">
                                    <a href="{{ route('social.login', 'naver') }}" class="btn-na btn-floating btn-sm" data-toggle="tooltip" title="네이버로 로그인">
                                        <i class="Archivo-font">N</i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
