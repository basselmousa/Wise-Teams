<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUs\ContactUsRequest;
use App\Mail\ContactUs\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function __invoke(ContactUsRequest $request)
    {
        Mail::to(config('mail.from.address'))->send(new ContactUsMail($request->email, $request->message));
        return redirect()->route('welcome')->with('success', 'Your complaint sent successfully');
    }
}
