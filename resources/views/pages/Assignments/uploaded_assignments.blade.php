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
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">File</th>
                        <th scope="col">Uploaded At</th>
                        <th scope="col">Upload Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=0)
                    @foreach($assignments->users as $assignment)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $assignment->username }}</td>
                            <td>
                                <form
                                    action="{{ route('teams.assignments.uploaded.downloadFile', [$id->id, $assignment->id]) }}"
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
                            <td>{{ "Action" }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop
