@extends('layouts.app', ['type' => 'forum'])

@section('content')
    <div class="container text-center my-5 py-5">
        <div class="row mb-3">
            <div class="col">
                <h3>
                    계정 삭제
                </h3>
            </div>
        </div>

        <div class="row text-left">
            <div class="col-md-6 offset-md-4">
                <form class="clearfix" action="{{ route('users.destroy', $user->id) }}" method="POST" role="form">
                    @csrf
                    @method('DELETE')

                    <h5>정말로 계정을 삭제하고 싶으세요?</h5>
                    <br>
                    <p>계정을 삭제하면 모든 개인정보가 삭제됩니다.</p>
                    <br>
                    <p>
                        @appName는 당신이 떠나는 것을 원하지 않아요.
                        우리가 만약 도와 줄수 있는 일이 있다면 <a href="mailto::{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>로 메일을 보내주세요.
                    </p>
                    <br>

                    <div class="checkbox-field">
                        <input type="checkbox" id="remove_confirm" name="remove_confirm" value="1" aria-describedby="remove_confirmHelpBlock">

                        <label for="remove_confirm" style="line-height: 23px;">
                            <strong>{{ $user->name }}</strong>님의 계정을 삭제하는 것을 확인하였습니다.
                        </label>
                        {!! $errors->first('remove_confirm', '<small id="remove_confirmHelpBlock" class="form-text text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group pull-right mt-2">
                        <button class="btn btn-primary" type="submit">
                            계정 삭제
                        </button>

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary">
                            취소
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
