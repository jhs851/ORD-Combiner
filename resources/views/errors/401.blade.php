@extends('errors::illustrated-layout')

@section('code', '401')
@section('title', __('권한이 없음'))

@section('image')
<div style="background-image: url('/svg/403.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('죄송합니다. 이 페이지에 액세스할 수 있는 권한이 없습니다.'))
