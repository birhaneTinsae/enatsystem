<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Contracts\Auditable;

class Employee extends Model //implements Auditable
{
    //
    //use \OwenIt\Auditing\Auditable;

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
