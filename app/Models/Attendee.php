<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone_number'];

    public function show_times()
    {
        return $this->belongsToMany('App\Models\ShowTime','attendee_show_times');
    }
    
}
