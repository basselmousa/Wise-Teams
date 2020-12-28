<?php

namespace App\Http\Controllers\Assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    public function __invoke()
    {

        return view('pages.Assignments.assignments');
    }
}
