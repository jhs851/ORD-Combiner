@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col position-relative">
                <h4 class="text-center">조합 설정</h4>
            </div>
        </div>

        @forelse ($rates as $rate)
            <div class="row mb-3">
                <div class="col-14">
                    <blockquote class="blockquote" style="border-color: {{ $rate->color }};">
                        <p class="bq-title py-2 pl-3" style="color: {{ $rate->color }};">{{ $rate->name }}</p>
                    </blockquote>
                </div>

                @forelse ($rate->units as $unit)
                    <div class="col-md-7 mb-3 d-flex align-items-center">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ $unit->imageUrl }}" alt="" width="40" height="40"><br>
                            {{ $unit->name }}
                        </div>

                        <span class="mx-2">=</span>

                        <set-formulas-component :data="{{ $unit }}" />
                    </div>
                @empty
                @endforelse
            </div>
        @empty
        @endforelse
    </div>
@stop
