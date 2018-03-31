<?php

namespace App\Policies;

use App\User;
use App\Transferpromotion;
use Illuminate\Auth\Access\HandlesAuthorization;

class Transferpromotionpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the transferpromotion.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotion  $transferpromotion
     * @return mixed
     */
    public function view(User $user, Transferpromotion $transferpromotion)
    {
       return $user->hasAccess(['view-transferpromotion']);
    }

    /**
     * Determine whether the user can create transferpromotions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return $user->hasAccess(['create-transferpromotion']);
    }

    /**
     * Determine whether the user can update the transferpromotion.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotion  $transferpromotion
     * @return mixed
     */
    public function update(User $user)
    {
            return $user->hasAccess(['update-transferpromotion']);
    }

    /**
     * Determine whether the user can delete the transferpromotion.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotion  $transferpromotion
     * @return mixed
     */
    public function delete(User $user)
    {
            return $user->hasAccess(['delete-transferpromotion']);
    }
}
