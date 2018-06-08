@extends('layouts.app')

@section('content')
    <combiner-view inline-template :units-count="{{ $unitsCount }}">
        <div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    @forelse ($columns as $column)
                        <div class="col-lg-2 col-md-7">
                            <rates-component :data="{{ $column->rates }}" v-on:push="append"></rates-component>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <modal-component></modal-component>
        </div>
    </combiner-view>
@stop
