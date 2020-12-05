@extends('layouts.app')
@section('title','Edit Profile')
@section('nav-title','Edit Profile')
@include('layouts.SideNavigation')

@section('content')
    <Section class="Edit-Profile">
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Full">Full Name</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                               name="fullname"
                               autocomplete="off" id="name"
                               aria-describedby="emailHelp" value="{{ auth()->user()->fullname }}">
                        @error('fullname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ auth()->user()->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">specialization</label>
                        <input type="text" name="specialization"
                               class="form-control @error('specialization') is-invalid @enderror" id="specialization" aria-describedby="emailHelp" value="{{ auth()->user()->specialization }}">
                        @error('specialization')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  row ">
                        <label for="gender" class="col-md-3 col-form-label">gender</label>
                        <div class="col-md-5 pl-0">
                            <div class="form-check">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="exampleRadios1" value="male" {{ auth()->user()->gender == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="gender">
                                    Male
                                </label>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="exampleRadios2" value="female" {{ auth()->user()->gender == 'female' ? 'checked' : ''}}>
                                <label class="form-check-label" for="gender">
                                    Female
                                </label>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="0" {{ auth()->user()->status == 0 ? 'selected' : '' }}>Available</option>
                            <option value="1" {{ auth()->user()->status == 1 ? 'selected' : '' }}>Busy</option>
                            <option value="2" {{ auth()->user()->status == 2 ? 'selected' : '' }}>Do not disturb</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button class="btn Edit-Btn mt-4">Save Changes</button>
                </form>
                <p class="p-edit" style="padding-left: 20px; color: #723BE4; font-style: italic; margin-top: 50px">
                    <a href="">Edit Profile Picture!</a>
                </p>
            </div>
            <div class="col-md-8">
                <div class="Edit-Img">

                </div>
            </div>

        </div>
    </Section>
@stop
