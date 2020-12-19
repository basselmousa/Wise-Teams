@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments Name')
@include('layouts.SideNavigation')
@section('content')
    <section class="Assignment-Show mt-5">

        <div class="row text-left">
            <div class="col-7">
                <h5>Question</h5>
                <span>
                    {{ $assignment->question }}
                </span>
            </div>
            <div class="col-7">
                <h5>Point</h5>
                <span>{{ $assignment->points }}</span>
            </div>
            <div class="col-7">
                <h5>Duration </h5>
                <span
                    class="{{ $assignment->ending_date < \Carbon\Carbon::now()->toDateTimeString() ? 'text-danger' : 'text-success' }}">
                    {{ $assignment->ending_date->diffForHumans() }}
                </span>
            </div>
            @if(auth()->id() != $assignment->team->manager_id)
                @foreach($assignment->users as $user)

                    <div class="col-7">
                        <h5>Last modified</h5>
                        <span
                            class="{{ $user->pivot->updated_at->gt($assignment->ending_date)  ? 'text-danger' : 'text-success' }}">
                        {{ $user->pivot->updated_at }}
                    </span>
                    </div>
                    <div class="col-7">
                        <h5>Submission status</h5>
                        <span class="text-success">Submitted for grading</span>
                    </div>

                @endforeach
            @else
                <div class="col-7">
                    <h5>Assignment Created At</h5>
                    <span>
                        {{ $assignment->created_at->diffForhumans() }}
                    </span>
                </div>
                <div class="col-7">
                    <h5>Number Of Submissions</h5>
                    <a href="{{ route('teams.assignments.uploaded.showUploads', [$assignment->team->id, $assignment->id]) }}"
                       class="text-success">
                        {{ count($assignment->users) }}
                    </a>
                </div>
            @endif


            {{--            <div class="col-7">--}}
            {{--                <h5>Time Remaining </h5>--}}
            {{--                <span class="">{{  \Carbon\Carbon::parse($assignment->ending_date)->diffForHumans(\Carbon\Carbon::now()) . " now" }}</span>--}}
            {{--            </div>--}}
        </div>
        @if(auth()->id() != $assignment->team->manager_id)
            <hr>
            <div class="row justify-content-center mt-5">
                <div class="col-6">
                    <h4 class="text-center mb-3">Upload Your Assignment</h4>
                    <form action="{{ route('teams.assignments.upload', [$assignment->team->id, $assignment->id] ) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('assignment') is-invalid @enderror"
                                       name="assignment"
                                       value="{{ old('assignment') }}" id="inputGroupFile01"
                                       required
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @error('assignment')
                            <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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

        @endif
    </section>
@stop
