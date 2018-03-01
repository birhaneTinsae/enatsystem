<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ActingEmployee extends Model
{
    //
    use SoftDeletes;

    protected $dates=[        
        'deleted_at',
        'from_date'
    ];
    public function job_position(){
        return $this->belongsTo('App\JobPosition');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
