@extends('layouts.app')
@section('title','home')
@section('nav-title','home')
@include('layouts.SideNavigation')
@section('content')
       <div class="text-center home-page  mx-auto" >
           <h1>Welcome Back {{ \App\Models\User::find(auth()->id())->fullname}} </h1>
       </div>
@endsection
