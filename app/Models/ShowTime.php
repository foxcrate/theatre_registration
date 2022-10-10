<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    public $fillable = ['movie_id','event_day_id','from','to'];

    public function event_day()
    {
        return $this->belongsTo('App\Models\EventDay');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function attendees()
    {
        return $this->belongsToMany('App\Models\Attendee','attendee_show_times');
    }

}
