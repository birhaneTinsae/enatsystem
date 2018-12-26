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
 /**
     * The table associated with the model.
     *
     * @var string
     */
    //protected $table = 'auth_group';

    //protected $fillable=['name','slug','permissions'];

    public function users(){
        return $this->belongsToMany(User::class,'role_users');
    }

    public function permissions(){
        return $this->belongsToMany(AuthPermission::class,'role_permissions');
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
       
        return $permissions[$permission]??false;
    }


}
