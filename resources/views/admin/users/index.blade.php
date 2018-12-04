@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-14">
                <h3 class="font-weight-bold">회원 설정</h3>
            </div>

            <table-component class="col-14 mt-3" inline-template endpoint="{{ route('api.admin.users.index') }}" v-cloak>
                <div>
                    @include('admin.users.partial.table')

                    <div class="d-flex justify-content-center mt-4">
                        <paginator-component :data-set="dataSet" @changed="fetch"></paginator-component>
                    </div>

                    <div class="d-flex justify-content-between py-3">
                        <button class="btn btn-danger m-0" @click="deletes">삭제</button>
                    </div>
                </div>
            </table-component>
        </div>
    </div>
@stop
