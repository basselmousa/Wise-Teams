@extends('layouts.app')
@section('title','Edit Profile')
@section('nav-title','Edit Profile')
@include('layouts.SideNavigation')
@section('content')
    <Section class="Edit-Profile">
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="{{ route('profile.update', $id->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Full">Full Name</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                               name="fullname"
                               autocomplete="off" id="name"
                               aria-describedby="emailHelp" value="{{ $id->fullname }}">
                        @error('fullname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ $id->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">specialization</label>
                        <input type="text" name="specialization"
                               class="form-control @error('specialization') is-invalid @enderror" id="specialization" aria-describedby="emailHelp" value="{{ $id->specialization }}">
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
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="exampleRadios1" value="male" {{ $id->gender == 'male' ? 'checked' : '' }}>
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
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="exampleRadios2" value="female" {{ $id->gender == 'female' ? 'checked' : ''}}>
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
                            <option value="0" {{ $id->status == 0 ? 'selected' : '' }}>Available</option>
                            <option value="1" {{ $id->status == 1 ? 'selected' : '' }}>Busy</option>
                            <option value="2" {{ $id->status == 2 ? 'selected' : '' }}>Do not disturb</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button class="btn Edit-Btn mt-4">Save Changes</button>
                </form>
                <p class="p-edit" style="padding-left: 20px; color: #723BE4; font-style: italic; margin-top: 50px;font-size: 16px">
                    <span type="button" class="" data-toggle="modal" data-target="#exampleModal">
                        Change Profile Picture!
                    </span>
                </p>
            </div>
            <div class="col-md-8">
                <div class="Edit-Img">

                </div>
            </div>
        </div>
    </Section>
@stop
@section('model')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <img class="d-block mx-auto rounded-circle " style="width: 130px; height: 130px"   id="blah" src="{{auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png')}}" alt="your image" />
                        </div>
                        <div class="col-12">
                            <form method="POST" action="{{ route('profile.avatar', auth()->id()) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('avatar') is-invalid @enderror"
                                               name="avatar"
                                               id="inputGroupFile01"
                                               aria-describedby="inputGroupFileAddon01"
                                               onchange="readURL(this);"
                                        >
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn Edit-Btn mt-4">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop
