@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('서비스를 사용할 수 없음'))

@section('image')
<div style="background-image: url('/svg/503.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __($exception->getMessage() ?: '죄송합니다, 지금 보수하고 있습니다. 곧 다시 확인해 주세요.'))
