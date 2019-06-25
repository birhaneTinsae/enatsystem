<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FourGThreeGMaintainance extends Model
{
    //
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
