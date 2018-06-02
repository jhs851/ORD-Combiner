@extends('layouts.app')

@section('content')
    <combiner-view inline-template class="container-fluid p-0" :units-count="{{ $unitsCount
     }}">
        <div class="row no-gutters">
            <div class="d-flex flex-wrap w-100">
                @forelse ($columns as $column)
                    <div style="width: {{ 100 / $columns->count() }}%;">
                        <rates-component :data="{{ $column->rates }}" @fetch="fetched"></rates-component>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </combiner-view>

    {{--<div id="wr_content_json">--}}
        {{--{{ App\Rate::orderBy('id', 'asc')->with('units')->get() }}--}}
    {{--</div>--}}

    {{--<div id="detail">--}}
        {{--<div class="window">--}}
            {{--<div class="title">--}}
                {{--<div class="name">사보-히든</div>--}}
                {{--<div class="close">X</div>--}}
            {{--</div>--}}
            {{--<div class="line descr">명령어같은거입니다.</div>--}}
            {{--<div class="line">조합법</div>--}}
            {{--<div class="line itemlist recipe">--}}
                {{--<div class="item">--}}
                    {{--<img class="thumb">--}}
                    {{--<div class="name">이름입니다</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="line">부족한 재료</div>--}}
            {{--<div class="line itemlist lack">--}}
            {{--</div>--}}
            {{--<div class="line">부족한 재료 (최하위)</div>--}}
            {{--<div class="line itemlist lack-lowest">--}}
            {{--</div>--}}
            {{--<div class="line">상위 조합</div>--}}
            {{--<div class="line itemlist upper">--}}
            {{--</div>--}}
            {{--<div class="line">최상위 조합</div>--}}
            {{--<div class="line itemlist top">--}}
            {{--</div>--}}
            {{--<div class="line">하위 재료</div>--}}
            {{--<div class="line itemlist lowrecipe">--}}
            {{--</div>--}}
            {{--<div class="line">하위 재료 (최하위)</div>--}}
            {{--<div class="line itemlist lowrecipe-lowest">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="grouplist"></div>--}}
@stop
