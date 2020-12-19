@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Team Name')
@include('layouts.SideNavigation')
@section('list-item')
    <li class="dropdown">
        <button class="btn Team-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$team->name}} <i class="fas fa-chevron-down ml-3"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/teams/info/{{$team->id}}">Info</a>
            @if ( $team->adding == 1 || $team->manager_id == auth()->id() )
                <a class="dropdown-item" href="/teams/add/{{$team->id}}">Add New Member</a>
            @endif
            <a class="dropdown-item" href="{{ route('teams.assignments.index', $team->id) }}">
                Show Assignments
            </a>
            @if(auth()->id()===$team->manager_id)
                <a class="dropdown-item" href="/teams/edit/{{$team->id}}">Edit</a>
                <form method="post" action="teams/delete/{{$team->id}}">
                    @csrf
                    @method('delete')
                    <button class="dropdown-item text-danger">delete</button>
                </form>
            @endif
        </div>
    </li>
@stop
@section('content')
    <div class="Team-Info mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                       <h3> Team Info</h3>
                    </div>
                    <div class="card-body">
                        <ul class="d-flex">
                            <li class="ml-4">Team Manager:      <span class="pl-1">{{$manager->fullname}}</span></li>
                            <li class="ml-4">Team Name :       <span class="pl-1">{{$team->name}}</span></li>
                            <li class="ml-4">Team Description: <span class="pl-1">{{$team->description}}</span></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 mb-5"><h1 class="text-center text-capitalize">statistics</h1></div>
            <div class="col-3 text-center">
                <a href="/teams/members/{{$team->id}}">
                    <div class="mb-2"><i class="fas fa-users"></i></div>
                    <h5>Members</h5>
                    <p>{{ $members->count() }}</p>
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="{{ route('teams.assignments.index', $team->id) }}">
                    <div class="mb-2"><i class="fas fa-file-alt"></i></div>
                    <h5>assigment</h5>
                    <p>{{ $assignments->count() }}</p>
                </a>
            </div>
            <div class="col-3 text-center">
                <div class="mb-2"><i class="fas fa-comment-dots"></i></div>
                <h5>Posts</h5>
                <p>100</p>
            </div>

        </div>

    </div>
@stop
