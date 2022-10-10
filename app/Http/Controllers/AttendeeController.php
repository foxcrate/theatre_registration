<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\EventDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AttendeeController extends Controller
{
    public function post_attend(Request $request)
    {
        // return "a;o";
        // $request->validate([
        //     'name' => 'required|min:4|max:255',
        //     'email' => 'required|email|unique:attendees',
        //     'phone_number' => 'required|numeric|min:10',
        // ]);

        // // return $validator;
        // if ($validator->fails()) {
            
        //     return "Alo";
        // }

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:attendees',
            'phone_number' => 'required|min:10|unique:attendees',
        ]);

        $show_time = ShowTime::find($request->show_time_id);

        if ($validator->fails()) {
            $the_movie = $show_time->movie;

            $show_times = $the_movie->show_times;
            $event_days = $the_movie->event_days();

            $all_movies = Movie::All();
    
            // return view('attendees.attendee_form',['show_times'=>$show_times,'event_days'=>$event_days, 'errors'=>$validator->errors()]);

            // return view('landing',['movies'=>$all_movies, 'errors'=>$validator->errors()]);
            return redirect()->route('landing')->with(['movies'=>$all_movies, 'errors'=>$validator->errors()]);
        }

        error_log('the request: '. $request);

        $new_attendee = Attendee::create(['name'=>$request->name,'email'=>$request->email,'phone_number'=>$request->phone_number]);

        // get the movie from show time then attach the movie to attendee
        
        $show_time = ShowTime::find($request->show_time_id);
        // $chosen_movie = $show_time->movie;

        $new_attendee->show_times()->attach($show_time);

        $new_attendee->save();

        return redirect()->route('landing')->with('success', 'You registered successfully ..');
        // return view('landing',['movies'=>$all_movies, 'errors'=>$validator->errors()]);

    }

    public function get_registration_for_movie(Request $request){

        $the_movie = Movie::find($request->movie_id);

        $show_times = $the_movie->show_times;
        $event_days = $the_movie->event_days();

        return view('attendees.attendee_form',['show_times'=>$show_times,'event_days'=>$event_days]);
    }

    public function all_attendees(Request $request){
        $attendees = Attendee::All();
        return view('attendees.all_attendees',['attendees'=>$attendees]);
    }

    public function attendee_details($id){
        $attendee = Attendee::find($id);
        return view('attendees.attendee_details',['attendee'=>$attendee]);
    }

}
