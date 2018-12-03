@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0 pt-4 pt-md-0">
        <div class="row no-gutters">
            <div class="col position-relative">
                <h4 class="text-center">특성 설정</h4>

                <create-modal-component title="특성 추가" type="characteristic"></create-modal-component>
            </div>
        </div>

        <set-characteristics-component :data="{{ $characteristics }}" />
    </div>
@stop
