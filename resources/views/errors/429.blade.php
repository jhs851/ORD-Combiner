@extends('errors::illustrated-layout')

@section('code', '429')
@section('title', __('요청이 너무 많음'))

@section('image')
<div style="background-image: url('/svg/403.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('죄송합니다. 서버에 너무 많은 요청을 하고 있습니다.'))
