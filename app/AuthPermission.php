<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthPermission extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auth_permissions';

    public function roles(){
        return $this->belongsToMany(Role::class,'role_users');
    }
}
