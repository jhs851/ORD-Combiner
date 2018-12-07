@extends('layouts.app', ['type' => 'forum'])

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-14 text-center">
                <h3 class="d-inline-block">아바타 변경</h3>
                <small>(변경하고 싶은 아바타를 더블클릭 하세요)</small>
            </div>
        </div>

        <avatars-component :data="{{ $avatars }}"></avatars-component>

        <div class="row mt-3">
            <div class="col-14 d-flex justify-content-end">
                <a class="btn btn-outline-primary" href="{{ route('users.edit', $user->id) }}">회원정보 수정</a>
            </div>
        </div>
    </div>
@stop
