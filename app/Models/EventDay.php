<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    use HasFactory;

    public $fillable = ['date'];

    public function show_times()
    {
        return $this->hasMany('App\Models\ShowTime');
    }



}
