<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Contracts\Auditable;

class Branch extends Model
{
    //
    public function Employees()
    {
        return $this->hasMany('App\Employee');
    }
}
