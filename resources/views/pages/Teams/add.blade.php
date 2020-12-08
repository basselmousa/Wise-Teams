@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Add New Member')
@include('layouts.SideNavigation')
@section('content')
    <section class="New-Member mt-5">
        <div class="row mt-3 justify-content-center">
            <div class="col-sm-12 col-md-12">
                <form action="/teams/add/{{$team->id}}" method="post">
                    @csrf
                    <div class="form-group row justify-content-lg-center">
                        <label for="username"
                               class="col-lg-3 col-xl-2 col-form-label text-lg-right">Member Ussr Name</label>
                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror" name="username"
                                   value="{{ old('username') }}" required placeholder="3170601031" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mt-lg-0">
                            <div class="col-lg-2 ">
                                <button type="submit" class="btn Edit-Btn">
                                    Find
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row ml-3">
            @if(isset($users))
                @foreach($users as $user)
                    <div class="col-12 col-md-10 mt-5">
                        <div class="row">
                            <div class="col-2 col-md-1 mt-2">
                                @if($user->avatar)
                                    <div class=" Members-Img mb-3 rounded-circle"
                                         style="background-image: url({{ asset('storage/'.$user->avatar) }})">
                                    </div>
                                @else
                                    <div class=" Members-Img  mb-3 rounded-circle"
                                         style="background-image: url({{  $user->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                                    </div>
                                @endif
                            </div>
                            <div class="col-6 col-md-3" style="margin-top: 13px">
                                <h5 class="pt-2">{{$user->fullname}}</h5>
                            </div>
                            <div class="col-3">
                                <form method="post" action="/teams/add/{{$team->id}}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$user->id}}" autocomplete="off" name="member"
                                               id="member" style="display: none"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn Edit-Btn">
                                            Add
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </section>
@stop
