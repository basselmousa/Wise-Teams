@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments')
@include('layouts.SideNavigation')
@section('list-item')
    <li><a href="{{ route('teams.todo.create', $id) }}"> <i class="fas fa-plus"></i> Create new Todo</a>
    </li>
    <li style="padding-left: 20px">
        <a href="{{ route('teams.todo.succeed', $id) }}"> <i class="fas fa-plus"></i> Show Done Tasks</a>
    </li>
@stop
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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i =0)
                        @foreach($todos as $todo)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> {{ $todo->task }} </td>
                                <td> {{ $todo->team->name }} </td>
                                <td> {{ $todo->done == 0 ? "Not Done" : "Done At : ". $todo->done_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <form action="{{ route('teams.todo.markAsDone', [$id->id, $todo->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn Edit-Btn">Done</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{ route('teams.todo.delete', [$id->id, $todo->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    @php(alert()->warning('You Dont have Any Task Yet')->autoClose(1000))
                    <div class="alert alert-warning">
                        You Dont Have Any Task , Make A new Task ||| Or Show Your Succeed Tasks
                    </div>
                @endif

            </div>
        </div>
    </section>
@stop
