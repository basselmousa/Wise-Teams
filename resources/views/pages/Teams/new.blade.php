@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('content')
    <div class="row">
        <div class="container Login ">
            <div class="row Login-row">
                <div class=" col-lg-5">
                    <div class="card">
                        <div class="card-header">New Team</div>
                        <div class="card-body">
                            <form method="POST" action="/teams">
                                @csrf

                                <div class="form-group row">
                                    <label for="Name" class="col-md-4 col-form-label text-md-right">Team Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                           class="col-md-4 col-form-label text-md-right">Description</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text"
                                               class="form-control @error('description') is-invalid @enderror"
                                               name="description" value="{{ old('description') }}" required
                                               autocomplete="name" autofocus>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="join" class="col-md-4 col-form-label text-md-right">Join</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  name="joining"
                                                   id="exampleRadios1" value="1">
                                            <label class="form-check-label" for="join">
                                                Join By Invite Only
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="joining"
                                                   id="exampleRadios2" value="0">
                                            <label class="form-check-label" for="join">
                                                Any One Can Join
                                            </label>
                                        </div>
                                        @error('joining')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="adding" class="col-md-4 col-form-label text-md-right">Add Member
                                        By</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="adding"
                                                   id="exampleRadios1" value="1">
                                            <label class="form-check-label" for="adding">
                                                Any Member
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="adding"
                                                   id="exampleRadios2" value="0">
                                            <label class="form-check-label" for="adding">
                                                Only By Manager
                                            </label>
                                        </div>
                                        @error('adding')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-5 ">
                    <div class="Team-Img">

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
