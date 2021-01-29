<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Set Middleware For This Controller
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show Home Page
     */
    public function __invoke()
    {
        return view('pages/home');
    }
}
