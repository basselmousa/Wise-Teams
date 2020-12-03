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

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['verified']], function (){
    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index'])->name('home');

    Route::get('/Edit',[\App\Http\Controllers\ProfileController::class , 'show']);
});

/** End Profile Routes */

/**
 * Start Teams Routes
 */

Route::group(['prefix' => 'teams', 'as' => 'teams.' , 'middleware' => ['verified']], function (){
    Route::get('/',function () {
        return view('Pages/Teams/teams');
    });
    Route::get('/team',function () {
        return view('pages/Teams/team');
    });
    Route::get('/new',function () {
        return view('pages/Teams/new');
    });
    Route::get('/edit',function () {
        return view('pages/Teams/edit');
    });
    Route::get('/add',function () {
        return view('pages/Teams/add');
    });
    Route::get('/info',function () {
        return view('pages/Teams/info');
    });
    Route::get('/assignments',function () {
        return view('Pages/Assignments/assignments');
    });
});

/** End Teams Routes */

/** Start Assignment Routes */

Route::group(['prefix' => 'assignments' , 'as' => 'assignments.', 'middleware' => ['verified'] ], function (){
    Route::get('/',function (){
        return view('Pages/Assignments/assignments');
    });
    Route::get('/new',function (){
        return view('Pages/Assignments/new');
    });
    Route::get('/Member-assignments',function (){
        return view('Pages/Assignments/assignment_for_member');
    });
});

/** End Assignment Routes */
