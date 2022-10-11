<?php

namespace App\Http\Controllers;

use App\Models\EventDay;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_days = EventDay::All();
        return view('event_days.all_event_days',['event_days'=>$event_days]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $after_week = Carbon::now();
        $after_week->addWeeks(1);

        $new_event_date = Carbon::create($request->date);
        if( $new_event_date->gt($after_week) ){
            return redirect()->back()->with('warning', "You can't register an event more than a week from now..");
        }
        
        $new_event_day = EventDay::create(['date'=>$request->date]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventDay  $eventDay
     * @return \Illuminate\Http\Response
     */
    public function show(EventDay $event_day)
    {
        return view('event_days.event_day_details',['event_day'=>$event_day]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventDay  $eventDay
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDay $eventDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventDay  $eventDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventDay $event_day)
    {
        $event_day->date = $request->date;
        $event_day->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventDay  $eventDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDay $event_day)
    {
        $event_day_show_times = $event_day->show_times;
        foreach( $event_day_show_times as $show_time ){
            $show_time->delete();
        }

        $event_day->delete();
        return redirect()->route('event_days.index');
    }
}
