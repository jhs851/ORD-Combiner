@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('콘텐츠에 접근할 권리를 가지고 있지 않음'))

@section('image')
<div style="background-image: url('/svg/403.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('죄송합니다. 이 페이지에 액세스할 수 없습니다.'))
