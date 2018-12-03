@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-14">
                <h3 class="font-weight-bold">버전 설정</h3>
            </div>

            <table-component class="col-14 mt-3" inline-template endpoint="{{ route('api.versions.index') }}" v-cloak>
                <div>
                    <div class="table-responsive">
                        <table class="table table-sm text-center table-striped mb-0">
                            <colgroup>
                                <col width="7%">
                                <col width="46.5%">
                                <col width="46.5%">
                            </colgroup>

                            <thead>
                                <tr>
                                    <th><input type="checkbox" @change="toggleChecks" :checked="parent"></th>
                                    <th>버전</th>
                                    <th>수정</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr is="set-version-component" v-for="item in items" :item="item" :key="item.id"></tr>

                                <tr v-if="! items.length" class="empty">
                                    <td>버전을 등록해주세요.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <paginator-component :data-set="dataSet" @changed="fetch"></paginator-component>
                    </div>

                    <div class="d-flex justify-content-between py-3">
                        <button class="btn btn-danger m-0" @click="deletes">삭제</button>

                        <create-modal-component type="version" title="버전 추가">
                            <button class="btn btn-primary m-0">버전 추가</button>
                        </create-modal-component>
                    </div>
                </div>
            </table-component>
        </div>
    </div>
@stop
