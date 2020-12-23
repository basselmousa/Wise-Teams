@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Activity')
@include('layouts.SideNavigation')

@section('content')
    <section class="Assignments mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Notification Type</th>
                        <th scope="col">Notification Action</th>
                        <th scope="col">On Action</th>
                        <th scope="col">Mark As Read</th>
                        {{--                        <th scope="col">Actions</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=0)
                    <tr class="">
                        @foreach($notifications as $notification)
                            <th scope="row">{{ ++$i }}</th>
                            {{--                            <td>--}}
                            {{--                                <a href="{{ route('teams.assignments.show', [$assignment->team->id, $assignment->id]) }}">{{ $assignment->name }}</a>--}}
                            {{--                            </td>--}}
                            <td>{{ getNameFromType($notification->type) }}</td>
                            <td>{{  getNotificationActionByDataPassed($notification->type,$notification->data, $notification->notifiable_id) }}</td>
                            <td>
                                {{ getFunctionTypeByDataPassed($notification->type, $notification->data,) }}
{{--                                @if( $notification->type == 'App\Notifications\AssignmentUploadedNotification')--}}
{{--                                    {{ getAssignmentNameFromID($notification->data['assignment']) }}--}}
{{--                                @elseif($notification->type == 'App\Notifications\TeamAssignmentNotification')--}}
{{--                                    {{$notification->data['team'] }}--}}
{{--                                @else--}}

{{--                                @endif--}}

                            </td>
                            <td>
                                @if($notification->read_at)
                                    <form action="{{ route('activity.notification.markAsUnRead') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="notificationID" value="{{ $notification->id }}">
                                        <button type="submit" class="btn Edit-Btn">Mark As Unread</button>
                                    </form>
                                @else
                                    <form action="{{ route('activity.notification.markAsRead') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="notificationID" value="{{ $notification->id }}">
                                        <button type="submit" class="btn Edit-Btn">Mark As Read</button>
                                    </form>
                                @endif
                            </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop
