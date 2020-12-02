@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments Name')
@include('layouts.SideNavigation')
@section('content')
    <section class="Assignment-Show mt-5">

        <div class="row text-left">
            <div class="col-7">
                <h5>Question</h5>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet atque earum esse eum illum laudantium perferendis perspiciatis quia ratione sint, tenetur voluptate. Consequatur deserunt explicabo, ipsum libero nesciunt rerum.</span>
            </div>
            <div class="col-7">
                <h5>Point</h5>
                <span>10</span>
            </div>
            <div class="col-7">
                <h5>Last modified</h5>
                <span>10/10/2020</span>
            </div>
            <div class="col-7">
                <h5>Submission status</h5>
                <span class="text-success">Submitted for grading</span>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <h4 class="text-center mb-3">Upload Your Assignment</h4>
                <form action="">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('assignment') is-invalid @enderror"
                                   name="assignment"
                                   value="{{ old('assignment') }}" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group w-25 mx-auto mt-4">
                        <div class="col-lg-2 ">
                            <button type="submit" class="btn Edit-Btn">
                                Upload
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
