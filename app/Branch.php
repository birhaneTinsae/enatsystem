<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Branch extends Model  implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;

    //
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
