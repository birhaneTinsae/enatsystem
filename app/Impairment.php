<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impairment extends Model
{
    //
    public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
