@extends('layouts.app', ['type' => 'forum'])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-14 text-center">
                <h3 class="font-weight-bold">회원정보 수정</h3>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <a href="{{ route('avatars.edit', $user->id) }}">
                    <img class="img-fluid rounded-circle" src="{{ $user->avatarUrl }}" alt="">
                    <p class="mb-0 mt-1">아바타 변경</p>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 offset-1 col-md-4 offset-md-5 p-4 border" style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                <form action="{{ route('users.update', $user->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')

                    <div class="md-form">
                        <input id="email" class="form-control" readonly type="email" value="{{ $user->email }}">
                        <label for="email">이메일</label>
                    </div>

                    <div class="md-form {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <input id="name" class="form-control" type="text" name="name" aria-describedby="nameHelpBlock" value="{{ old('name', $user->name) }}">
                        <label for="name">이름</label>
                        {!! $errors->first('name', '<small id="nameHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <input id="password" class="form-control" type="password" name="password" aria-describedby="passwordHelpBlock" value="{{ old('password') }}">
                        <label for="password">새 비밀번호</label>
                        {!! $errors->first('password', '<small id="passwordHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <input id="password_confiramtion" class="form-control" type="password" name="password_confirmation" value="{{ old('password') }}">
                        <label for="password_confiramtion">새 비밀번호 확인</label>
                    </div>

                    <div class="md-form {{ $errors->has('tel') ? 'is-invalid' : '' }}">
                        <input id="tel" class="form-control" type="tel" name="tel" aria-describedby="telHelpBlock" value="{{ old('tel', $user->tel) }}">
                        <label for="tel">연락처</label>
                        {!! $errors->first('tel', '<small id="telHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            수정하기
                        </button>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('users.dropout', $user->id) }}">계정을 삭제하고 싶으신가요?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
