@extends('admin.layouts.app')

@section('content')
    <div class="container my-9">
        <div class="row">
            <div class="col text-center">
                <img class="img-fluid rounded-circle z-depth-1" src="{{ $user->avatarUrl }}" alt="">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-10 offset-2 col-md-4 offset-md-5 px-4 py-3 border" style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')

                    <div class="form-group text-center">
                        <div class="switch">
                            <input type="hidden" value="0" name="email_verfied">

                            <label style="font-size: 12px; color: black;">
                                이메일 미인증
                                <input type="checkbox" value="1" name="email_verfied" {{ old('email_verfied', $user->hasVerifiedEmail()) ? 'checked' : '' }}>
                                <span class="lever"></span>
                                이메일 인증
                            </label>
                        </div>
                        {!! $errors->first('email_verfied', '<small class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form">
                        <input class="form-control" type="email" readonly aria-describedby="emailHelpBlock" value="{{ $user->email }}">
                        <label for="email">이메일</label>
                    </div>

                    <div class="md-form {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <input id="name" class="form-control" type="text" name="name" aria-describedby="nameHelpBlock" value="{{ old('name', $user->name) }}">
                        <label for="name">이름</label>
                        {!! $errors->first('name', '<small id="nameHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <input id="password" class="form-control" type="password" name="password" aria-describedby="passwordHelpBlock" value="{{ old('password') }}">
                        <label for="password">비밀번호</label>
                        {!! $errors->first('password', '<small id="passwordHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <input id="password_confiramtion" class="form-control" type="password" name="password_confirmation" value="{{ old('password') }}">
                        <label for="password_confiramtion">비밀번호 확인</label>
                    </div>

                    <div class="md-form {{ $errors->has('tel') ? 'is-invalid' : '' }}">
                        <input id="tel" class="form-control" type="tel" name="tel" aria-describedby="telHelpBlock" value="{{ old('tel', $user->tel) }}">
                        <label for="tel">연락처</label>
                        {!! $errors->first('tel', '<small id="telHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="md-form {{ $errors->has('visits') ? 'is-invalid' : '' }}">
                        <input id="visits" class="form-control" type="number" name="visits" aria-describedby="visitsHelpBlock" value="{{ old('visits', $user->visits) }}">
                        <label for="visits">방문수</label>
                        {!! $errors->first('visits', '<small id="visitsHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block mb-0" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-10 offset-2 col-md-4 offset-md-5 d-flex justify-content-end px-0 mt-3">
                <a class="btn btn-outline-primary mx-1 mb-0" href="{{ route('admin.users.index') }}">
                    목록보기
                </a>

                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" @submit="destroy">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger ml-1 mr-0 mb-0">삭제</button>
                </form>
            </div>
        </div>
    </div>
@stop
