<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPECategory extends Model
{
    //
    public function asset_items(){
        return $this->hasMany('App\AssetItem');
    }
}
