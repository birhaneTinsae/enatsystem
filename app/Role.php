<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    // protected $auditInclude = [
    //     'name',
    //     'slug',
    // ];

    protected $fillable=['name','slug','permissions'];

    public function users(){
        return $this->belongsToMany(User::class,'role_users');
    }

    public function hasAccess(array $permissions){
        foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
        }

        return false;
    }

    protected function hasPermission(string $permission){
        $permissions=json_decode($this->permissions,true);
        //ternary operator new syntax on php 7
        //dd($permission);
        return $permissions[$permission]??false;
    }
}
