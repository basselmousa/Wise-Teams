<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/i/{ass}', function (\App\Models\Assignment $ass){
//    $user = \App\Models\User::find(\auth()->id());
    $user = \App\Models\Assignment::find(1);
//    $ass = \App\Models\Assignment::find(1);
//    $user->assignments()->save($ass,[
//        'file_path' => \Illuminate\Support\Str::random()
//    ]);
//    dd($user->assignments);
//    dd($ass->users);
    foreach ($ass->users as $item) {
        dd($item);
    }
});

//Auth
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Start Profile Routes
 *
 */

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['verified']], function () {
    Route::get('/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'show'])->name('home');
    Route::get('/Edit/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'edit'])->name('edit');
    Route::middleware(['password.confirm'])->group(function () {
        Route::put('/Edit/avatar/{id}', [\App\Http\Controllers\Profile\UploadAvatarController::class, 'uploadAvatar'])->name('avatar');
        Route::put('/Edit/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'destroy'])->name('delete');

    });
});

/** End Profile Routes */

/**
 * Start Teams Routes
 */

Route::group(['prefix' => 'teams', 'as' => 'teams.', 'middleware' => ['verified', 'auth']], function () {
    //show All
    Route::get('/', [App\Http\Controllers\Teams\TeamController::class, 'index'])->name('teams');

    //Creating
    Route::get('/new', [App\Http\Controllers\Teams\TeamController::class, 'create'])->name('newTeam');
    Route::post('/', [App\Http\Controllers\Teams\TeamController::class, 'store']);

    //editing
    Route::get('/edit/{team}', [App\Http\Controllers\Teams\TeamController::class, 'edit'])->name('editTeam');
    Route::put('/edit/{team}', [App\Http\Controllers\Teams\TeamController::class, 'update']);

    //deleting
    Route::delete('/delete/{team}', [App\Http\Controllers\Teams\TeamController::class, 'destroy']);

    //information
    Route::get('/info/{team}', [App\Http\Controllers\Teams\TeamController::class, 'show'])->name('teamInfo');

    //Team Post Page
    Route::get('/team/{team}',[\App\Http\Controllers\Teams\TeamChatController::class,'index']);
    Route::get('/team/posts/{team}',[\App\Http\Controllers\Teams\TeamChatController::class,'posts']);
    Route::post('/team/post',[\App\Http\Controllers\Teams\TeamChatController::class,'post']);

    //Add New member

    Route::get('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'new']);
    Route::post('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'find']);
    Route::put('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'add']);



    //Find Teams
    Route::get('/find', [\App\Http\Controllers\Teams\TeamController::class, 'find']);

    //Join and leaving Teams
    Route::get('/find', [\App\Http\Controllers\Teams\TeamJoinController::class, 'findpage'])->name('find');
    Route::post('/find',[\App\Http\Controllers\Teams\TeamJoinController::class,'finding']);
    Route::post('/join/{team}',[\App\Http\Controllers\Teams\TeamJoinController::class,'join']);
    Route::delete('/leaving/{team}',[\App\Http\Controllers\Teams\TeamJoinController::class,'leaving']);


    //Team Assignments
    Route::group(['prefix' => '{id}', 'as' => 'assignments.'], function (){
        Route::get('/assignments',[\App\Http\Controllers\Teams\Assignments\TeamsAssignmentController::class, 'index'])->name('index');
        Route::get('/assignments/new',[\App\Http\Controllers\Teams\Assignments\TeamsAssignmentController::class, 'create'])->name('new');
        Route::post('/assignments/new',[\App\Http\Controllers\Teams\Assignments\TeamsAssignmentController::class, 'store'])->name('create');
        Route::get('/assignments/Member-Assignment/{assignment}',[\App\Http\Controllers\Teams\Assignments\TeamsAssignmentController::class, 'show'])->name('show');
        Route::post('/assignments/Member-Assignment/{assignment}',[\App\Http\Controllers\Teams\Assignments\UploadAssignmentsController::class, 'store'])->name('upload');
        Route::delete('/assignments/delete/{assignment}',[\App\Http\Controllers\Teams\Assignments\TeamsAssignmentController::class, 'destroy'])->name('delete');

        // Uploaded Files For Assignment Routes
        Route::group(['prefix' => 'uploaded/{assignments}','as' => 'uploaded.'], function (){
            Route::get('/', [\App\Http\Controllers\Teams\Assignments\UploadedAssignmentsController::class, 'index'])->name('showUploads');
            Route::post('/', [\App\Http\Controllers\Teams\Assignments\UploadedAssignmentsController::class, 'download'])->name('downloadFile');
        });

    });

    //Team Members
    Route::get('/members/{team}',[\App\Http\Controllers\Teams\MembersController::class,'index']);
});

/** End Teams Routes */

/** Start Assignment Routes */

Route::group(['prefix' => 'assignments', 'as' => 'myAssignments.', 'middleware' => ['verified']], function () {
    Route::get('/', [\App\Http\Controllers\Assignments\AssignmentController::class, 'index'])->name('show');
    Route::get('/new', function () {
        return view('Pages/Assignments/new');
    });
    Route::get('/Member-assignments', function () {
//        return view('Pages/Assignments/assignment_for_member');
//        $ass = \App\Models\Assignment::all();
//        $team = \App\Models\Team::find(1);
//        $assd = $ass->team;
//        foreach ($team->assignments as $assignment) {
//            dump($assignment->question);
//
//        }
//        dump($assd->description);
//        dump(auth()->user()->teams);
//        foreach ($ass as $item) {
//            dump($item->team->name);
//        }
//        dd($ass[0]->team->manager->teams[0]->assignments);
//        dd($ass[0]->team->manager->fullname);
//        foreach ($ass as $ass) {
//            dump($ass->team);
//
//        }
    });
});

/** End Assignment Routes */

/** Start Contact Us Routes */
Route::group(['prefix' => 'contact', 'as' => 'contact.' ], function (){
    Route::post('sendcontactemail', [\App\Http\Controllers\ContactUs\ContactUsController::class, 'sendContactEmail'])->name('sendContact');
});
/** End Contact Us Routes */
