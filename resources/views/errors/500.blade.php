@extends('errors::illustrated-layout')

@section('code', '500')
@section('title', __('오류'))

@section('image')
<div style="background-image: url('/svg/500.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('이런, 우리 서버에 뭔가 이상이 생겼어요.'))
