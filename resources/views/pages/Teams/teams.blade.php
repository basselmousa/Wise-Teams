@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Teams')
@include('layouts.SideNavigation')
@section('list-item')
    <li class="mr-3"><a href="/teams/new"> <i class="fas fa-plus"></i> Create new Teams</a></li>
    <li><a href="/teams/find"> <i class="fas fa-search"></i> Find new Teams</a></li>
@stop
@section('content')
    <div class="row mt-5">
        @foreach($teams as $team)
            <div class=" col-12 col-sm-6 col-lg-3 mb-4 ">
                <div class="Team-box ">
                    <div class="w-100">
                        <div class="row justify-content-end h-100 justify-content-between w-100">
                            <div class="col-12 text-right p-0">
                                <div class="dropdown">
                                    <button class="dropdown-toggle Option" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 10000">
                                        <a class="dropdown-item" href="/teams/info/{{$team->id}}">Info</a>
                                        @if ( $team->adding == 1 || $team->manager_id == auth()->id() )
                                            <a class="dropdown-item" href="/teams/add">Add New Member</a>
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
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <h2><a href="/teams/team">{{$team->name}}</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            @foreach($teamsjoined as $team)
                <div class=" col-12 col-sm-6 col-lg-3 mb-4 ">
                    <div class="Team-box ">
                        <div class="w-100">
                            <div class="row justify-content-end h-100 justify-content-between w-100">
                                <div class="col-12 text-right p-0">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle Option" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 10000">
                                            <a class="dropdown-item" href="/teams/info/{{$team->id}}">Info</a>
                                            @if ( $team->adding == 1 || $team->manager_id == auth()->id() )
                                                <a class="dropdown-item" href="/teams/add">Add New Member</a>
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
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <h2><a href="/teams/team">{{$team->name}}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@stop
