@extends('layouts.app');
@section('title','Profile')
@section('nav-title','Profile')
@include('layouts.SideNavigation')
@section('content')
    <section class="profile">
        <div class="row mt-3 mb-5">
            <div class="col-12 mt-5">
                <h1 class="text-center mb-3">{{ $id->fullname }}</h1>

            </div>
            <div class="col-md-12">
<<<<<<< HEAD
                @if( $id->avatar)
                    <div class="text-center mx-auto Avatar mb-3"
                         style="background-image: url({{ asset('storage/'. $id->avatar) }})">
                    </div>
                @else
                    <div class="text-center mx-auto Avatar mb-3"
                         style="background-image: url({{   $id->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
=======
                @if(auth()->user()->avatar)
                    <div class="text-center mx-auto Avatar mb-3 rounded-circle"
                         style="background-image: url({{ asset('storage/'.auth()->user()->avatar) }})">
                    </div>
                @else
                    <div class="text-center mx-auto Avatar mb-3 rounded-circle"
                         style="background-image: url({{  auth()->user()->gender == 'female' ? asset('images/female.png') : asset('images/male.png') }})">
>>>>>>> 056ed6c2934bca5f6a4f61783a3da1dc28873cdc
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
                            <li>{{  $id->username }}</li>
                            <li>{{  $id->email }}</li>
                            <li>{{  $id->specialization }}</li>
                            <li>{{  $id->gender }}</li>
                            <li>
                                @if( $id->status == 0)
                                    {{ 'Available' }}
                                @elseif( $id->status == 1)
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
        @if( $id->id == auth()->id() )
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
        @endif
    </section>
@stop

