@extends('layouts.app', ['type' => 'forum'])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-14">
                <h3 class="font-weight-bold">코드 설정</h3>
            </div>

            <table-component class="col-14 mt-3" inline-template endpoint="{{ route('api.loads.index', $user->id) }}" v-cloak>
                <div>
                    @include('loads.partial.table')

                    <div class="d-flex justify-content-center mt-4">
                        <paginator-component :data-set="dataSet" @changed="fetch"></paginator-component>
                    </div>

                    <div class="d-flex justify-content-between py-3">
                        <button class="btn btn-danger m-0" @click="deletes">삭제</button>

                        <create-modal-component type="Load" title="코드 추가">
                            <button class="btn btn-primary m-0">코드 추가</button>
                        </create-modal-component>
                    </div>
                </div>
            </table-component>
        </div>
    </div>
@stop
