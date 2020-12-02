@extends('layouts.app');
@section('title','Profile')
@section('nav-title','Profile')
@include('layouts.SideNavigation')
@section('content')
    <section class="profile">
        <div class="row mt-3 mb-5">
            <div class="col-12 mt-5" >
                <h1 class="text-center mb-3">Yazeed ahamad kamal Nazzal</h1>

            </div>
            <div class="col-md-12">
                <div class="text-center mx-auto Avatar mb-3"></div>

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
                                    <li>3170601031</li>
                                    <li>Yazeed_nazal@gmail.com</li>
                                    <li>Cs</li>
                                    <li>male</li>
                                    <li>Available</li>
                                </ul>

                            </div>
                        </div>
            </div>
        </div>
        <div class="w-75 mx-auto d-flex justify-content-end">
            <button class="btn Edit-Btn"><a href="/profile/Edit">Edit Profile</a></button>
        </div>
    </section>
@stop
