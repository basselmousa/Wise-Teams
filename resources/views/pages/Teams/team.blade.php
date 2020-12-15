@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
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
@section('style')
    .Main-body
    {
        background-image: url("/images/chat.jpg");
        background-size: cover;
        background-repeat: repeat;

    }
    .shadow-row
    {
        background: white;
    }
@stop
@section('content')
    <team-page></team-page>
@stop

