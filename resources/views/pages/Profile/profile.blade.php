@extends('layouts.app');
@section('title','Profile')
@section('nav-title','Profile')
@include('layouts.SideNavigation')
@section('content')
    <section class="profile">
        <div class="row mt-3 mb-5">
            <div class="col-12 mt-5">
                <h1 class="text-center mb-3">{{ auth()->user()->fullname }}</h1>

            </div>
            <div class="col-md-12">
                @if(auth()->user()->avatar)
                    <div class="text-center mx-auto Avatar mb-3 rounded-circle"
                         style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                    </div>
                @else
                    <div class="text-center mx-auto Avatar mb-3 rounded-circle"
                         style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
                    </div>
                @endif

            </div>

            <div class="col-md-12">
                <div class="col-md-6 col-xl-5 mx-auto">
                    <div class="profile-data mb-5 d-flex justify-content-between">
                        <ul class="d-flex flex-column">
                            <li>UserName</li>
                            <li>Eamil</li>
                            <li>specialization</li>
                            <li>Gender</li>
                            <li>Status</li>
                        </ul>
                        <ul class="d-flex flex-column inf">
                            <li>{{ auth()->user()->username }}</li>
                            <li>{{ auth()->user()->email }}</li>
                            <li>{{ auth()->user()->specialization }}</li>
                            <li>{{ auth()->user()->gender }}</li>
                            <li>
                                @if(auth()->user()->status == 0)
                                    {{ 'Available' }}
                                @elseif(auth()->user()->status == 1)
                                    {{ 'Busy' }}
                                @else
                                    {{ 'Do Not Disturb' }}
                                @endif
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row w-75 justify-content-end">
            <div class="mr-4">
                <button class="btn Edit-Btn"><a href="{{ route('profile.edit', auth()->id()) }}">Edit Profile</a>
                </button>
            </div>
            <div class="">
                <form action="{{ route('profile.delete', auth()->id()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Profile</button>
                </form>
            </div>
        </div>
    </section>
@stop

