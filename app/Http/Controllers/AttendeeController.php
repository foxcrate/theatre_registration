<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\EventDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AttendeeController extends Controller
{
    public function post_attend(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:attendees',
            'phone_number' => 'required|numeric|min:10',
        ]);

        // return $request;

        error_log('the request: '. $request);

        $new_attendee = Attendee::create(['name'=>$request->name,'email'=>$request->email,'phone_number'=>$request->phone_number]);

        $chosen_movie = Movie::find($request->movie_id);

        $new_attendee->movies->attach();

        return redirect()->back()->with('success', 'You registered successfully ..');

        // $aa = Attendee::find(2);
        // $mm = Movie::find(4);
        // $mm->attendees()->attach($aa);

        // return $mm->attendees;


        // return Redirect::back()->withErrors($validator);
        // return redirect()->back()->with('success', 'You registered successfully ..');
        // return Redirect::back()->withErrors($validator);

    }

    public function get_attend(Request $request){

        $movies = Movie::All();
        $show_times = ShowTime::All();
        $event_days = EventDay::All();

        return view('attendees.attendee_form',['movies'=>$movies,'show_times'=>$show_times,'event_days'=>$event_days]);
    }

    public function all_attendees(Request $request){
        $attendees = Attendee::All();
        return view('attendees.all_attendees',['attendees'=>$attendees]);
    }

}
