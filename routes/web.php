<?php

use App\Models\Movie;
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
    $all_movies = Movie::All();

    $available_movies = [];

    foreach( $all_movies as $movie ){
        if( count($movie->show_times) > 0 ){
            array_push( $available_movies , $movie );
        }
    }

    // return $available_movies;
    return view('landing',['movies'=>$available_movies]);
})->name('landing');

Route::post('/get_registration_for_movie', [AttendeeController::class, 'get_registration_for_movie']);


Route::post('/post_attend', [AttendeeController::class, 'post_attend'])->name('post_attend');

Auth::routes();

// Admin Closed Routes //
Route::group(['middleware' => 'auth'], function () {

    Route::get('/attendee_details/{id}', [AttendeeController::class, 'attendee_details']);

    Route::resource('event_days', EventDayController::class);

    Route::resource('show_times', ShowTimeController::class);

    Route::resource('movies', MovieController::class);

    Route::get('/all_attendees', [AttendeeController::class, 'all_attendees']);
    
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
