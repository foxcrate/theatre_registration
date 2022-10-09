<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone_number'];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie','attendee_movies');
    }
    
}
