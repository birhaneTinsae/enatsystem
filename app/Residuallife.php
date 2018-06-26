<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Residuallife extends Model
{   
     use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'residual_lifes';
      protected $connection = 'sqlsrv2';
         public function asset(){
        return $this->belongsTo('App\Asset');
    }
}
