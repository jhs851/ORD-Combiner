@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">이메일 확인</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                귀하의 이메일 주소로 새로운 확인 링크가 발송되었습니다.
                            </div>
                        @endif

                        계속하기 전에 이메일에서 확인 링크를 확인하십시오.
                        이메일을 받지 못했다면 <a href="{{ route('verification.resend') }}">여기</a>를 클릭하여 다른 이메일을 요청하십시오.
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
