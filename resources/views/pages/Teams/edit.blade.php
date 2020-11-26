@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('style')
    .Edit-Team .form-group .form-control {
         width: 100%;

    }
@stop

@section('content')
    <Section class="Edit-Team ml-4" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="/edit">
                    @csrf
                    <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" autocomplete="off" name="name" id="name"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="description">Email</label>
                        <input type="text" class="form-control" name="description" id="description" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group  row ">
                        <label for="invitation" class="col-md-3 col-form-label">Invitation</label>
                        <div class="col-md-5 pl-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="invitation" id="exampleRadios1" value="1">
                                <label class="form-check-label" for="invitation">
                                    Join By Invite Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="invitation" id="exampleRadios2" value="0">
                                <label class="form-check-label" for="invitation">
                                    Any One Can Join
                                </label>
                            </div>
                            @error('invitation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn Edit-Btn mt-4">Save Changes</button>
                </form>
            </div>
            <div class="col-md-5">
                <div class="Edit-Team-Img">

                </div>
            </div>

        </div>
    </Section>
@stop
