@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('서비스를 사용할 수 없음'))

@section('image')
<div style="background-image: url('/svg/503.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __($exception->getMessage() ?: '죄송합니다. 유지 보수 중입니다. 더 나은 서비스로 빠른 시일 내에 찾아뵙겠습니다.'))
