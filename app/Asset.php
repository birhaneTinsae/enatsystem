<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
  protected $connection = 'sqlsrv2';
    public function branch(){         
         return $this->belongsTo('App\Branch');
    }
    public function asset_item(){
        return $this->belongsTo('App\AssetItem');
    }

    public function ppe_categorie(){
        return $this->belongsTo('App\PPECategory');
    }
}
