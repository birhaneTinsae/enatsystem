<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetItem extends Model
{
    protected $connection = 'sqlsrv2';
     public function p_p_e_categorie(){
        return $this->belongsTo('App\PPECategory');
    }
}
