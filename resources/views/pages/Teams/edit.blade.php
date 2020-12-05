@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('style')
    .Edit-Team .form-group .form-control {
         width: 100%;

    }
@stop

@section('list-item')
    <li class="dropdown">
        <button class="btn Team-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$team->name}} <i class="fas fa-chevron-down ml-3"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/teams/info/{{$team->id}}">Info</a>
            @if ( $team->joining == 1 || $team->manager_id == auth()->id() )
                <a class="dropdown-item" href="/teams/add">Add New Member</a>
            @endif

            @if(auth()->id()===$team->manager_id)
                <a class="dropdown-item" href="/teams/edit/{{$team->id}}">Edit</a>
                <form action="teams/delete/{{$team->id}}">
                    @csrf
                    @method('delete')
                    <button class="dropdown-item text-danger">delete</button>
                </form>
            @endif
        </div>
    </li>
@stop
@section('content')
    <Section class="Edit-Team ml-4" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="/teams/edit/{{ $team->id }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" autocomplete="off" value="{{$team->name}}" name="name" id="name"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" name="description" id="description" aria-describedby="emailHelp">{{$team->description}}</textarea>
                    </div>
                    <div class="form-group  row ">
                        <label for="invitation" class="col-md-4 col-form-label">Invitation</label>
                        <div class="col-md-5 pl-0">
                            <div class="form-check">
                                <input  class="form-check-input" type="radio"  {{$team->joining == 0?'checked':''}} name="joining" id="exampleRadios1" value="0">
                                <label class="form-check-label" for="joining">
                                    Join By Invite Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{$team->joining == 1 ?'checked':''}} name="joining" id="exampleRadios2" value="1">
                                <label class="form-check-label" for="joining">
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
                        <label for="adding" class="col-md-4 col-form-label ">Add Member By</label>
                        <div class="col-md-5 pl-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{$team->adding == 1?'checked':''}} name="adding" id="exampleRadios1" value="1">
                                <label class="form-check-label" for="adding">
                                    Any Member
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{$team->adding == 0?'checked':''}} name="adding" id="exampleRadios2" value="0">
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
