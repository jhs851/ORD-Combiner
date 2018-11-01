@extends('layouts.app')

@section('into-mask-content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-2 text-center text-md-left d-flex flex-column justify-content-center wow fadeInLeft animated" data-wow-delay="0.3s">
                <a href="{{ route('social.login', 'naver') }}" class="btn btn-na btn-block position-relative mx-0 my-2">
                    <string class="d-flex align-items-center justify-content-center">
                        <span class="Archivo-font position-absolute" style="left: 1rem;">N</span>
                        네이버로 로그인
                    </string>
                </a>

                <a href="{{ route('social.login', 'kakao') }}" class="btn btn-yellow btn-block position-relative mx-0 my-2">
                    <string class="d-flex align-items-center justify-content-center ka-ic">
                        <i class="fa fa-comment position-absolute" style="left: 1rem;"></i>
                        카카오로 로그인
                    </string>
                </a>
            </div>

            <div class="col-md-5 wow fadeInRight animated" data-wow-delay="0.3s">
                <div class="card">
                    <div class="card-header">회원가입</div>

                    <div class="card-body py-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="md-form {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                <input id="name" class="form-control" type="text" name="name" aria-describedby="nameHelpBlock" value="{{ old('name') }}">
                                <label for="name">이름</label>
                                {!! $errors->first('name', '<small id="nameHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
                                <label for="email">이메일</label>
                                {!! $errors->first('email', '<small id="emailHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                <input id="password" class="form-control" type="password" name="password" aria-describedby="passwordHelpBlock" value="{{ old('password') }}">
                                <label for="password">비밀번호</label>
                                {!! $errors->first('password', '<small id="passwordHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" aria-describedby="password_confirmationHelpBlock" value="{{ old('password_confirmation') }}">
                                <label for="password_confirmation">비밀번호 확인</label>
                                {!! $errors->first('password_confirmation', '<small id="password_confirmationHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('tel') ? 'is-invalid' : '' }}">
                                <input id="tel" class="form-control" type="tel" name="tel" aria-describedby="telHelpBlock" value="{{ old('tel') }}">
                                <label for="tel">연락처</label>
                                {!! $errors->first('tel', '<small id="telHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <p>
                                @appName의 <a href="{{ route('terms') }}" target="_blank">이용약관</a> 및 <a href="{{ route('privacy') }}" target="_blank">개인정보취급방침</a> 에 동의합니다.
                            </p>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    가입하기
                                </button>

                                <p class="mt-3">
                                    가입하셨나요? <a href="{{ route('login') }}">로그인하세요.</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
