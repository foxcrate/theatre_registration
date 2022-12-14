<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Movie;
use App\Models\EventDay;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // error_log('index() in ShowTimeController');
        $show_times = ShowTime::All();
        $event_days = EventDay::All();
        $movies = Movie::All();
        return view('show_times.all_show_times',['show_times'=>$show_times,'event_days'=>$event_days,'movies'=>$movies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $event_day = EventDay::find($req->event_day_id);
        if( count($event_day->show_times) >= 3 ){
            return redirect()->back()->with('warning','Max number of show times per one day is 3');
        }
        $new_show_time = ShowTime::create(['event_day_id'=>$req->event_day_id,'from'=>$req->from,'to'=>$req->to,'movie_id'=>$req->movie_id]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function show(ShowTime $showTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowTime $show_time)
    {
        $event_days = EventDay::All();
        $movies = Movie::All();
        return view('show_times.edit_show_time  ',['show_time'=>$show_time,'event_days'=>$event_days,'movies'=>$movies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, ShowTime $show_time)
    {
        $show_time->from = $req->from;
        $show_time->to = $req->to;

        $show_time->event_day_id = $req->event_day_id;
        // $movie = Movie::find($req->movie_id);
        $show_time->movie_id = $req->movie_id;
        $show_time->save();
        return redirect()->route('show_times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowTime $showTime)
    {
        $showTime->delete();
        return redirect()->back();
    }
}
