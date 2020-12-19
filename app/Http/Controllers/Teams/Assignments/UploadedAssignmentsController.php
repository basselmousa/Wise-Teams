<?php

namespace App\Http\Controllers\Teams\Assignments;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadedAssignmentsController extends Controller
{
    public function index(Team $id, Assignment $assignments)
    {

        return view('pages.Assignments.uploaded_assignments', compact('id', 'assignments'));
    }

    public function download(Team $id, Assignment $assignments, Request $request)
    {
        $file = Str::after($request->file_path, '.');
        return Storage::download($request->file_path, $request->file_name.".".$file);
    }
}
