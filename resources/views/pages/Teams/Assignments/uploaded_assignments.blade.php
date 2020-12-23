@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Uploaded Assignments')
@include('layouts.SideNavigation')
{{--@section('list-item')--}}
{{--    @if(auth()->id() == $id->manager_id)--}}
{{--        <li><a href="{{ route('teams.assignments.new', $id) }}"> <i class="fas fa-plus"></i> Create new Assignment</a>--}}
{{--        </li>--}}
{{--    @endif--}}
{{--@stop--}}
@section('content')
    <section class="Assignments mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                    @if(! $assignments->users)
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">File</th>
                            <th scope="col">Uploaded At</th>
                            <th scope="col">Upload Status</th>
                            <th scope="col">Assignment Point</th>
                            <th scope="col">Grade User Assignment</th>
                        </tr>
                    @endif

                    </thead>
                    <tbody>
                    @php($i=0)
                    @forelse($assignments->users as $assignment)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $assignment->username }}</td>
                            <td>
                                <form
                                    action="{{ route('teams.assignments.uploaded.downloadFile', [$id->id, $assignments->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="file_path" value="{{ $assignment->pivot->file_path }}">
                                    <input type="hidden" name="file_name"
                                           value="{{ $assignments->team->name."-".$assignment->username . "-". $assignment->fullname }}">
                                    <button type="submit" class="btn btn-primary">Download File</button>
                                </form>
                            </td>
                            <td>{{ $assignment->pivot->updated_at->diffForHumans() }}</td>
                            <td>{{ $assignment->pivot->status }}</td>
                            <td>{{ $assignments->points }}</td>
                            <td>
                                <form method="post" action="{{ route('teams.assignments.uploaded.grading', [$id->id, $assignments->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ $assignment->id }}">
                                    <input type="number" name="grade"
                                           class="form-control grade-input d-inline-block @error('grade') is-invalid @enderror">

                                    <button class="btn Edit-Btn d-inline-block" type="submit">point</button>
                                    @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </form>
                            </td>
                        </tr>
                    @empty
                         @php( alert('Empty Table','There is no data','warning'))
                        <div class="alert alert-success">There Is no Data</div>
                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop
