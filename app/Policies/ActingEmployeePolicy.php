<?php

namespace App\Policies;

use App\User;
use App\ActingEmployee;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActingEmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
  /*   public function __construct()
    {
        //
    } */
        public function view(User $user, ActingEmployee $employee)
    {
        //
        return $user->hasAccess(['view-actingemployee']);
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
          //dd($user->hasAccess(['create-actingemployee']));
        return $user->hasAccess(['create-actingemployee']);
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function update(User $user)
    {
        //
       //dd($user->hasAccess(['update-actingemployee']));
        return $user->hasAccess(['update-actingemployee']);
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function delete(User $user, ActingEmployee $employee)
    {
        //
        return $user->hasAccess(['delete-actingemployee']);
    }
}
