@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Create New Assignment')
@include('layouts.SideNavigation')
@section('content')
    <div class="row">
        <div class="container Login mt-0 ">
            <div class="row Login-row">
                <div class=" col-lg-5">
                    <div class="card">
                        <div class="card-header">New Assignment</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('teams.assignments.create', $id->id) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="Name" class="col-md-4 col-form-label text-md-right">Assignment Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="questions" class="col-md-4 col-form-label text-md-right">Questions</label>

                                    <div class="col-md-6">
                                        <textarea rows="5" id="questions" type="text" class="form-control @error('questions') is-invalid @enderror" name="questions" value="{{ old('questions') }}" required autocomplete="false" autofocus></textarea>

                                        @error('questions')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="point" class="col-md-4 col-form-label text-md-right">Assignment Point</label>

                                    <div class="col-md-6">
                                        <input id="point" type="number"
                                               class="form-control @error('point') is-invalid @enderror" name="point"
                                               value="{{ old('point') }}" required autocomplete="point" autofocus>

                                        @error('point')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">Ending Date</label>

                                    <div class="col-md-6">
                                        <input id="date" type="date"
                                               class="form-control @error('date') is-invalid @enderror" name="date"
                                               value="{{ old('date') }}" required autocomplete="date" autofocus>

                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-5 ">
                    <div class="Assignment-Img">

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
