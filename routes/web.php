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

    //Show Team Page
    Route::get('/team', function () {
        return view('pages/Teams/team');
    });

    //Add New member

    Route::get('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'new']);
    Route::post('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'find']);
    Route::put('/add/{team}',[\App\Http\Controllers\Teams\MembersController::class,'add']);


    //Join and leaving Teams
    Route::get('/find', [\App\Http\Controllers\Teams\TeamJoinController::class, 'findpage'])->name('find');
    Route::post('/find',[\App\Http\Controllers\Teams\TeamJoinController::class,'finding']);
    Route::post('/join/{team}',[\App\Http\Controllers\Teams\TeamJoinController::class,'join']);
    Route::delete('/leaving/{team}',[\App\Http\Controllers\Teams\TeamJoinController::class,'leaving']);

    //Team Assignments
    Route::get('/assignments', function () {
        return view('Pages/Assignments/assignments');
    });

    //Team Members
    Route::get('/members/{team}',[\App\Http\Controllers\Teams\MembersController::class,'index']);
});

/** End Teams Routes */

/** Start Assignment Routes */

Route::group(['prefix' => 'assignments', 'as' => 'assignments.', 'middleware' => ['verified']], function () {
    Route::get('/', function () {
        return view('Pages/Assignments/assignments');
    });
    Route::get('/new', function () {
        return view('Pages/Assignments/new');
    });
    Route::get('/Member-assignments', function () {
        return view('Pages/Assignments/assignment_for_member');
    });
});

/** End Assignment Routes */
