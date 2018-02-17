<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActingEmployee extends Model
{
    //
    public function job_position()
    {
        return $this->hasOne('App\JobPosition');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
