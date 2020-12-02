@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('list-item')
    <li class="dropdown">
        <button class="btn Team-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Team Name <i class="fas fa-chevron-down ml-3"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/teams/info">Info</a>
            <a class="dropdown-item" href="/teams/add">Add New Member</a>
            <a class="dropdown-item" href="/teams/assignments">Assignments</a>
            <a class="dropdown-item" href="/teams/edit">Edit</a>
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

