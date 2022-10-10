<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    public $fillable = ['time','event_day_id','movie_id'];

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
