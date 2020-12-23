<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class ActivityController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::where('notifiable_id' ,'=',auth()->id())->get();
        return view('pages.activity.main', compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notification = DatabaseNotification::find($request->notificationID);
        $notification->markAsRead();
        return back()->with('toast_success' , 'Marked As Read');
    }

    public function markAsUnRead(Request $request)
    {
        $notification = DatabaseNotification::find($request->notificationID);
        $notification->markAsUnread();
        return back()->with( 'toast_success', 'Marked As UnRead');
    }
}
