<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetItem extends Model
{
    //
    public function ppe_category(){
        return $this->belongsTo('App\PPECategory','p_p_e_category_id');
    }
}
