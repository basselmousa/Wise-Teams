@extends('layouts.app')
@section('title','Login')
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
    <div class="row justify-content-center Login-row">
        <div class="col-md-8">
            <div class="card mx-auto">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
