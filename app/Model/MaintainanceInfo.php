<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MaintainanceInfo extends Model
{
    //
    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function getReceivedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function getCompletionDateAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }
}
