@extends('layouts.intro')

@section('intro-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 wow fadeInRight animated" data-wow-delay="0.3s">
                <div class="card">
                    <div class="card-header">비밀번호 변경</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email', $email) }}">
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

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    비밀번호 변경
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
