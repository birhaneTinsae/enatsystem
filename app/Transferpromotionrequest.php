<?php

namespace App;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transferpromotionrequest extends Model implements Auditable
{
    use SoftDeletes;    
    use \OwenIt\Auditing\Auditable;
     public function job_position()
    {
        return $this->belongsTo('App\JobPosition');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
      public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
