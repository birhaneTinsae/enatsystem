<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\MessageTemplete;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class SMSPasswordNotificationController extends Controller
{
    //
    public function index(){
        $branches=Branch::orderBy('branch_name')->pluck('branch_name','id');
        $msg_templetes=MessageTemplete::all()->pluck('name','id');
        return view('notification.notification',['branches'=>$branches,'msg_templetes'=>$msg_templetes]);
    }
    /**
     * Send the SMS given 'Phone Number' and 'Message Content'.
     */
    public function send(Request $request){

        $client = new Client();
        $response=  $client->get("http://10.1.12.156:13013/cgi-bin/sendsms?username=enat&password=enat&text=".$request->msg."&to=".$request->phone_no."&charset=utf-8&coding=2");
       
        if($response->getStatusCode()==200 || (string) $response->getBody()=='0: Accepted for delivery'){
            $request->session()->flash('status', 'SMS successfully sent to '.$request->employee.' by Phone no '.$request->phone_no.'!');
            return redirect('/sms-password-notification');
        }
    }
}
