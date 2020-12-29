@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('list-item')
    <li class="dropdown">
        <button class="btn Team-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
    @if(auth()->id() == $team->manager_id)
        <video-chat :teamid="{{$team->id}}"></video-chat>
    @else
        <meeting-join :teamid="{{$team->id}}"></meeting-join>
    @endif

@stop
