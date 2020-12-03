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
          <div class="container  Login">
              <div class="row Login-row ">
                  <div class="col-lg-5">
                      <div class="card">
                          <div class="card-header">{{ __('Login') }}</div>

                          <div class="card-body">
                              <form method="POST" action="{{ route('login') }}">
                                  @csrf

                                  <div class="form-group row">
                                      <label for="email"
                                             class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                      <div class="col-md-6">
                                          <input id="email" type="email"
                                                 class="form-control @error('email') is-invalid @enderror" name="email"
                                                 value="{{ old('email') }}" required autocomplete="email" autofocus>

                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="password"
                                             class="col-md-4 col-form-label text-md-right" >{{ __('Password') }}</label>

                                      <div class="col-md-6">
                                          <input id="password" type="password"
                                                 class="form-control @error('password') is-invalid @enderror"
                                                 name="password" required autocomplete="current-password">

                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-md-6 offset-md-4">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="remember"
                                                     id="remember" {{ old('remember') ? 'checked' : '' }}>

                                              <label class="form-check-label" for="remember">
                                                  {{ __('Remember Me') }}
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-8 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Login') }}
                                          </button>

                                          @if (Route::has('password.request'))
                                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                                  {{ __('Forgot Your Password?') }}
                                              </a>
                                          @endif
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-7">
                        <div class="Login-Img">

                        </div>
                  </div>
              </div>
          </div>
{{--          <div id="particles-js">--}}

{{--          </div>--}}
@stop


