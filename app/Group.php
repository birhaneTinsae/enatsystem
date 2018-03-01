<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Group extends Model
{
    //
    use Notifiable;

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}
