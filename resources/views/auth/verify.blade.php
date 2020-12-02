@extends('layouts.app')
@section('title','Verify')
@include('layouts.navigation')
@section('style')
    .Main-body
    {
    left:0px;
    width:100%;
    }
    .welcome-nav{
    -webkit-box-shadow: 0px -3px 32px -9px #723BE4 !important ;
    box-shadow: 0px -3px 32px -12px #723BE4 !important;
    margin-top: 0px !important;

    }
@stop
@section('content')
<div class="container Login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mx-auto">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
