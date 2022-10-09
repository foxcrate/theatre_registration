<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $fillable = ['title','ticket_cost','show_time_id'];

    public function attendees()
    {
        return $this->belongsToMany('App\Models\Attendee','attendee_movies');
    }

    public function show_time()
    {
        return $this->belongsTo('App\Models\ShowTime');
    }

}
