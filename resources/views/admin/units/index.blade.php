@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid p-0 pt-4 pt-md-0">
        <div class="row no-gutters">
            <div class="col position-relative">
                <h4 class="text-center">유닛 설정</h4>

                <create-modal-component title="유닛 추가" type="unit"></create-modal-component>
            </div>
        </div>

        <div class="row no-gutters">
            @forelse ($columns as $column)
                <div class="col-lg-2 col-md-7">
                    @forelse ($column->rates as $rate)
                        <div class="list-group p-1">
                            <div class="list-group-item text-white waves-effect waves-light rounded-0 p-2" style="background-color: {{ $rate->color }}">
                                {{ $rate->name }}
                            </div>

                            <set-units-component rate-id="{{ $rate->id }}" :data="{{ $rate->units }}" />
                        </div>
                    @empty
                    @endforelse
                </div>
            @empty
            @endforelse
        </div>
    </div>
@stop
