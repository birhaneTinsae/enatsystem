<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


    //
//use OwenIt\Auditing\Contracts\Auditable; 
use OwenIt\Auditing\Contracts\Auditable; 

class JobPosition extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;  
    public function employees(){
        return $this->hasMany('App\Employee');
    }
      
    public function job_position_steps(){
        return $this->hasMany('App\JobPositionStep');
    }
    
}
