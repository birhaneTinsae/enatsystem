<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    public function Employees()
    {
        return $this->hasMany('App\Employee');
    }
}
