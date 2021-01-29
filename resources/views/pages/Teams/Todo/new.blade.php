@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Create New Assignment')
@include('layouts.SideNavigation')
@section('content')
    <div class="row mt-5">
        <div class="container Login mt-0 ">
            <div class="row Login-row">
                <div class=" col-lg-5">
                    <div class="card">
                        <div class="card-header">New Assignment</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('teams.todo.store', $id->id) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="Name" class="col-md-4 col-form-label text-md-right">Task</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('task') is-invalid @enderror" name="task"
                                               value="{{ old('task') }}" required autocomplete="name" autofocus>

                                        @error('task')
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
                    <div class="Task-img" style="height: 400px">

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
