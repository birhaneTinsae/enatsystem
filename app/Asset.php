<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    public function branch(){
        return $this->belongsTo('App\Branch');
    }
    public function asset_item(){
        return $this->belongsTo('App\AssetItem');
    }
}
