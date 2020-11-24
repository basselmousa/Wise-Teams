@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
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

