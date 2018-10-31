@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('페이지 만료'))

@section('image')
<div style="background-image: url('/svg/403.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('죄송합니다. 세션이 만료되었습니다. 새로 고친 후 다시 시도하십시오.'))
