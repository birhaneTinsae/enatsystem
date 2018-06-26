<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPEDepreciation extends Model
{
       protected $table = 'ppe_depreciations';
      protected $connection = 'sqlsrv2';
       public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
