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

Route::get('/i/{ass}', function (\App\Models\Team $ass){
    foreach ($ass->todos as $todo) {
        dump($todo->team_id, $todo->task);
    }
    dd("ss");
});

//Auth
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, '__invoke'])->name('home');

/**
 * Start Profile Routes
 *
 */

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['verified']], function () {
    Route::get('/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'show'])->name('home');
    Route::middleware(['password.confirm'])->group(function () {
        Route::get('/Edit/{id}', [\App\Http\Controllers\Profile\ProfileController::class, 'edit'])->name('edit');
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
    // Todo List For Teams
    Route::group(['prefix' => '{id}', 'as' => 'todo.'], function (){
        Route::get('/todo', [\App\Http\Controllers\Todo\TodoController::class, 'index'])->name('show');
        Route::get('/todo/donned', [\App\Http\Controllers\Todo\TodoController::class, 'succeed'])->name('succeed');
        Route::get('/todo/create', [\App\Http\Controllers\Todo\TodoController::class, 'create'])->name('create');
        Route::post('/todo/create', [\App\Http\Controllers\Todo\TodoController::class, 'store'])->name('store');
        Route::put('/todo/{todo}', [\App\Http\Controllers\Todo\TodoController::class, 'markAsDone'])->name('markAsDone');
        Route::delete('/todo/{todo}', [\App\Http\Controllers\Todo\TodoController::class, 'destroy'])->name('delete');

    });
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

    //Team Members
    Route::get('/members/{team}',[\App\Http\Controllers\Teams\MembersController::class,'index']);

    //Team Meeting
    Route::get('/meeting/{team}',[\App\Http\Controllers\Teams\MeetingController::class,'index']);
    Route::post('/meeting',[\App\Http\Controllers\Teams\MeetingController::class,'store']);
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
            Route::put('/', [\App\Http\Controllers\Teams\Assignments\UploadedAssignmentsController::class, 'grade'])->name('grading');
        });

    });
});

/** End Teams Routes */

/** Start Assignment Routes */

Route::group(['prefix' => 'assignments', 'as' => 'myAssignments.', 'middleware' => ['verified']], function () {
    Route::get('/', [\App\Http\Controllers\Assignments\AssignmentController::class, '__invoke'])->name('show');
});

/** End Assignment Routes */

/** Start Contact Us Routes */
Route::group(['prefix' => 'contact', 'as' => 'contact.' ], function (){
    Route::post('sendcontactemail', [\App\Http\Controllers\ContactUs\ContactUsController::class, '__invoke'])->name('sendContact');
});
/** End Contact Us Routes */

Route::group(['prefix' => 'teams' , 'as' => 'activity.', 'middleware' => ['verified']], function (){
    Route::get('activity', [\App\Http\Controllers\Activity\ActivityController::class, 'index'])->name('main');
    Route::post('activity', [\App\Http\Controllers\Activity\ActivityController::class, 'markAsRead'])->name('notification.markAsRead');
    Route::put('activity', [\App\Http\Controllers\Activity\ActivityController::class, 'markAsUnRead'])->name('notification.markAsUnRead');
});
