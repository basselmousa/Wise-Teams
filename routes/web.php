<?php

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
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Profile
Route::prefix('profile')->group(function () {
    Route::get('/',function () {
       return view('pages/Profile/profile');
    });
    Route::get('/Edit',function () {
        return view('pages/Profile/Edit-Profile');
    });
});
//Teams
Route::prefix('teams')->group( function () {
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
});


