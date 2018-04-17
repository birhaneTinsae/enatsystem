<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
      protected $connection = 'sqlsrv2';
       public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
