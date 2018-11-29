@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0 pt-4 pt-md-0">
        <div class="row no-gutters">
            <div class="col position-relative">
                <h4 class="text-center">등급 설정</h4>

                <create-modal-component title="등급 추가" type="rate"></create-modal-component>
            </div>
        </div>

        <div class="row no-gutters">
            @forelse ($columns as $column)
                <div class="col-lg-2 col-md-7">
                    <set-rates-component column_id="{{ $column->id }}" :data="{{ $column->rates }}" />
                </div>
            @empty
            @endforelse
        </div>
    </div>
@stop
