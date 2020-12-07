@extends('layouts.app')
@section('title','Teams');
@section('nav-title')
{{$team->name . " "}} Members
@stop
@include('layouts.SideNavigation')
@section('content')
    <section class="New-Member mt-5">
        <div class="row">
            <div class="col-md-3 ml-5 mt-5">
                <div class="row align-content-center">
                    <div class="col- mr-1 mt-2">
                        @if(auth()->user()->avatar)
                            <div class=" Members-Img mb-3 rounded-circle"
                                 style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                            </div>
                        @else
                            <div class=" Members-Img  mb-3 rounded-circle"
                                 style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                            </div>
                        @endif
                    </div>
                    <div class="col-6" style="margin-top: 13px">
                        <h5 class="pt-2">yazeed Nazal</h5>
                    </div>

                </div>
            </div>
            <div class="col-md-3 ml-5 mt-5">
                <div class="row align-content-center">
                    <div class="col- mr-1 mt-2">
                        @if(auth()->user()->avatar)
                            <div class=" Members-Img mb-3 rounded-circle"
                                 style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                            </div>
                        @else
                            <div class=" Members-Img  mb-3 rounded-circle"
                                 style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                            </div>
                        @endif
                    </div>
                    <div class="col-6" style="margin-top: 13px">
                        <h5 class="pt-2">yazeed Nazal</h5>
                    </div>

                </div>
            </div>
            <div class="col-md-3 ml-5 mt-5">
                <div class="row align-content-center">
                    <div class="col- mr-1 mt-2">
                        @if(auth()->user()->avatar)
                            <div class=" Members-Img mb-3 rounded-circle"
                                 style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                            </div>
                        @else
                            <div class=" Members-Img  mb-3 rounded-circle"
                                 style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                            </div>
                        @endif
                    </div>
                    <div class="col-6" style="margin-top: 13px">
                        <h5 class="pt-2">yazeed Nazal</h5>
                    </div>

                </div>
            </div>
            <div class="col-md-3 ml-5 mt-5">
                <div class="row align-content-center">
                    <div class="col- mr-1 mt-2">
                        @if(auth()->user()->avatar)
                            <div class=" Members-Img mb-3 rounded-circle"
                                 style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                            </div>
                        @else
                            <div class=" Members-Img  mb-3 rounded-circle"
                                 style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                            </div>
                        @endif
                    </div>
                    <div class="col-6" style="margin-top: 13px">
                        <h5 class="pt-2">yazeed Nazal</h5>
                    </div>

                </div>
            </div>
        </div>

    </section>
@stop
