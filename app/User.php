<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable //implements Auditable,UserResolver
{
    use Notifiable,HasRoles;
   
   // use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id','password','username','first_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function roles(){
    //     return $this->belongsToMany(Role::class,'role_users');
    // }
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }

    // public function hasAccess(array $permissions){
    //     foreach($this->roles as $role){
    //         if($role->hasAccess($permissions)){
    //             return true;
    //         }
    //     }

    //     return false;
    // }
    // public static function resolvedId(){
    //     return Auth::check()?Auth::user()->getAuthIdentifier():null;
    // }
}
