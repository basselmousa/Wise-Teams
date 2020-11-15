@extends('layouts.app')
@section('title','Edit Profile')
@section('nav-title','Edit Profile')
@include('layouts.SideNavigation')

@section('content')
    <Section class="Edit-Profile">
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="/edit">
                    @csrf
                    <div class="form-group">
                        <label for="Full">Full Name</label>
                        <input type="text" class="form-control" autocomplete="off" id="name"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">specialization</label>
                        <input type="text" class="form-control" id="specialization" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control">
                            <option>Available</option>
                            <option>Busy</option>
                            <option> Do not disturb</option>
                        </select>
                    </div>
                    <button class="btn Edit-Btn mt-4">Save Changes</button>
                </form>
                <p class="p-edit" style="padding-left: 20px; color: #723BE4; font-style: italic; margin-top: 50px">Edit Profile Picture!</p>
            </div>
            <div class="col-md-8">
                <div class="Edit-Img">

                </div>
            </div>

        </div>
    </Section>
@stop
