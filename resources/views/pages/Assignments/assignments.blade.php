@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments')
@include('layouts.SideNavigation')
@section('content')
    <section class="Assignments mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                    @if(count(auth()->user()->teamsjoined))
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Team</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Assignment Status</th>
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                    @php($i=0)
                    @forelse(auth()->user()->teamsjoined as $joined)
                        @foreach($joined->assignments as $assignment)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>
                                    <a href="{{ route('teams.assignments.show', [$assignment->team->id, $assignment->id]) }}">{{ $assignment->name }}</a>
                                </td>
                                <td>{{ $assignment->team->name }}</td>
                                <td>{{ $assignment->ending_date->diffForHumans() }}</td>
                                <td>
                                    @if($assignment->ending_date < \Carbon\Carbon::now()->toDateTimeString())
                                        <span
                                            class="text-danger">Ending {{ $assignment->ending_date->diffForHumans() }}</span>
                                    @else
                                        <span
                                            class="text-success">Available to {{ $assignment->ending_date->diffForHumans() }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        @php( alert('Empty Table','You Are Not Joined To Any Team','warning'))
                        <div class="alert alert-warning">You Are Not Member In Any Team</div>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop
