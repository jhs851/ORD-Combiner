@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-14 d-flex justify-content-between">
                <h3>아바타 설정</h3>

                <a href="{{ route('admin.users.index') }}">회원 설정</a>
            </div>
        </div>

        <set-avatars-component :data="{{ $avatars }}"></set-avatars-component>
    </div>
@stop
