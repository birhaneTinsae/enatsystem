<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetItem extends Model
{
    protected $connection = 'sqlsrv2';
     public function ppe_category(){
        return $this->belongsTo('App\PPECategory');
    }
}
