<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Contracts\Auditable; 

class SMSPasswordNotification extends Model //implements  Auditable
{
    //
    //use \OwenIt\Auditing\Auditable;

    protected $auditInclude = [
        'message',
        'phone_no',
        'sender',
    ];

}
