@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments')
@include('layouts.SideNavigation')
@section('content')
    <section class="Assignments mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                @if( count($todos)>0 )
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Team</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i =0)
                        @foreach($todos as $todo)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> {{ $todo->team_id }} </td>
                                <td> {{ $todo->task }} </td>
                                <td> {{ $todo->done == 0 ? "Not Done" : convertFromTimeStampToHumanTime($todo->done_at) }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    @php(alert()->warning('You Dont have Any Donned Task Yet')->autoClose(1000))
                    <div class="alert alert-warning">You Dont Have Any Task Donned, Complete A one </div>
                @endif

            </div>
        </div>
    </section>
@stop
