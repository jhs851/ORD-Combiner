@extends('layouts.intro')

@section('intro-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card wow fadeInRight animated" data-wow-delay="0.3s">
                    <div class="card-header">비밀번호 초기화</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                @lang(session('status'))
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
                                <label for="email">이메일</label>
                                {!! $errors->first('email', '<small id="emailHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    비밀번호 초기화 링크 보내기
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
