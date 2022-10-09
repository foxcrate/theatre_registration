<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    public $fillable = ['time','event_day_id'];

    public function event_day()
    {
        return $this->belongsTo('App\Models\EventDay');
    }

    public function movie()
    {
        return $this->hasOne('App\Models\Movie');
    }

}
