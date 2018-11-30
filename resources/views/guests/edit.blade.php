@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 wow fadeInRight animated" data-wow-delay="0.3s">
                <div class="card">
                    <div class="card-header">추가 정보 입력</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('guests.update', $guest->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="md-form {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelpBlock" value="{{ old('email') }}">
                                <label for="email">소셜 이메일</label>
                                {!! $errors->first('email', '<small id="emailHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="md-form {{ $errors->has('tel') ? 'is-invalid' : '' }}">
                                <input id="tel" class="form-control" type="tel" name="tel" aria-describedby="telHelpBlock" value="{{ old('tel') }}">
                                <label for="tel">연락처</label>
                                {!! $errors->first('tel', '<small id="telHelpBlock" class="form-text text-danger">:message</small>') !!}
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    가입하기
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
