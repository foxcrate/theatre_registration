<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EventDayController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\AttendeeController;

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
    return view('landing');
});

Route::get('/get_attend', [AttendeeController::class, 'get_attend']);

Route::post('/post_attend', [AttendeeController::class, 'post_attend'])->name('post_attend');

Auth::routes();

// Student Closed Routes //
Route::group(['middleware' => 'auth'], function () {

    // Route::post('/update_event_day/{event_day_id}', [EventDayController::class, 'update'])->name('update_event_day');
    Route::resource('event_days', EventDayController::class);

    Route::resource('show_times', ShowTimeController::class);

    // Route::get('/movies', [MovieController::class, 'index'])->name('movies');
    Route::resource('movies', MovieController::class);

    Route::get('/all_attendees', [AttendeeController::class, 'all_attendees']);
    
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
