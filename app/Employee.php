<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model implements Auditable
{
    //
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

   

    public function job_position()
    {
        return $this->belongsTo('App\JobPosition');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
