<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TTRegister extends Model
{
    //

    protected $casts=[
        'disconnected_at'=>'datetime:Y-m-d\TH:i',
        'registered_at'=>'datetime:Y-m-d\TH:i',
        'reconnected_at'=>'datetime:Y-m-d\TH:i',
    ];

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function getDisconnectedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getReconnectedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
    
    public function getRegisteredAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

}
