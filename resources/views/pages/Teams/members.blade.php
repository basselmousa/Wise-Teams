@extends('layouts.app')
@section('title','Teams');
@section('nav-title')
{{$team->name . " "}} Members
@stop
@include('layouts.SideNavigation')
@section('content')
    <section class="New-Member mt-5">
        <div class="row">
            @foreach($members as $member)
                <div class="col-md-3 ml-5 mt-5">
                    <div class="row align-content-center">
                        <div class="col- mr-1 mt-2">
                            @if($member->avatar)
                                <div class=" Members-Img mb-3 rounded-circle"
                                     style="background-image: url({{ asset('storage/'.$member->avatar) }})">
                                </div>
                            @else
                                <div class=" Members-Img  mb-3 rounded-circle"
                                     style="background-image: url({{  $member->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                                </div>
                            @endif
                        </div>
                        <div class="col-6" style="margin-top: 13px">
                            <a href="/profile/{{$member->id}}"><h5 class="pt-2">{{$member->fullname}}</h5></a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </section>
@stop
