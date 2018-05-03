<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
      protected $connection = 'sqlsrv2';
      public function asset(){
        return $this->belongsTo('App\Asset');
    }
    
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
