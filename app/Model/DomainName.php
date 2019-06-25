<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DomainName extends Model
{
    //
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
