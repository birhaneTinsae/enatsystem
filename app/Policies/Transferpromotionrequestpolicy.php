<?php

namespace App\Policies;

use App\User;
use App\Transferpromotionrequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class Transferpromotionrequestpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the transferpromotionrequest.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotionrequest  $transferpromotionrequest
     * @return mixed
     */
    public function view(User $user, Transferpromotionrequest $transferpromotionrequest)
    {
      return $user->hasAccess(['view-transferpromotionrequest']);
    }

    /**
     * Determine whether the user can create transferpromotionrequests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return $user->hasAccess(['create-transferpromotionrequest']);
    }

    /**
     * Determine whether the user can update the transferpromotionrequest.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotionrequest  $transferpromotionrequest
     * @return mixed
     */
    public function update(User $user)
    {
       return $user->hasAccess(['update-transferpromotionrequest']);
    }

    /**
     * Determine whether the user can delete the transferpromotionrequest.
     *
     * @param  \App\User  $user
     * @param  \App\Transferpromotionrequest  $transferpromotionrequest
     * @return mixed
     */
    public function delete(User $user)
    {
          return $user->hasAccess(['delete-transferpromotionrequest']);
    }
}
