<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SMSNotification extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'message'=>$this->message,
            'phone_no'=>$this->phone_no,
            'sender'=>$this->sender,
            'created_at'=>$this->created_at->toDayDateTimeString()        
        ];
    }
}
