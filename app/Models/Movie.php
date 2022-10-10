<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $fillable = ['title','ticket_cost','show_time_id'];

    public function show_times()
    {
        return $this->hasMany('App\Models\ShowTime');
    }

    public function event_days()
    {
        $movie_show_times = $this->show_times;
        $movie_event_days = [];

        foreach ($movie_show_times as $show_time) {
            array_push( $movie_event_days , $show_time->event_day );
        }

        return $movie_event_days;
    }

}
