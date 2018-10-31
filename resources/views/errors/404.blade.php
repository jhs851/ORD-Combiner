@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('페이지를 찾을 수 없음'))

@section('image')
<div style="background-image: url('/svg/404.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('죄송합니다. 찾고있는 페이지를 찾을 수 없습니다.'))
