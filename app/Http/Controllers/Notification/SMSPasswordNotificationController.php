<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Employee;
use App\MessageTemplete;
use App\SMSPasswordNotification;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
class SMSPasswordNotificationController extends Controller
{
    //
    public function index(){
        $notifications=SMSPasswordNotification::all();
       return view('notification.notification',['notifications'=>$notifications]);
    }

    public function create(){
        $branches=Branch::orderBy('name')->pluck('name','id');
        $msg_templetes=MessageTemplete::all()->pluck('name','id');
        return view('notification.new',['branches'=>$branches,'msg_templetes'=>$msg_templetes]);
    }
    /**
     * Send the SMS given 'Phone Number' and 'Message Content'.
     */
    public function send(Request $request){


        //to fetch employee name having employee id.
        $emp_name=Employee::find($request->employee)->user->name;

        //formatted message containing employee full name,password and current date 
        $msg=sprintf($request->msg,$emp_name,$request->password,now()->toFormattedDateString());

        
        $client = new Client();


        //$response=  $client->get("http://10.1.12.156:13013/cgi-bin/sendsms?username=enat&password=enat&text=".$msg."&to=".$request->phone_no."&charset=utf-8&coding=2");
        $response=  $client->get('http://10.1.12.156:13013/cgi-bin/sendsms',[
            'query' => ['username' => 'enat','password'=>'enat','text'=>$msg,'to'=>$request->phone_no,'charset'=>'utf-8','coding'=>'2']
            ]);
      
        /**
        * check if the response is ok and store the notification log to the database including who send the notification,receiver's phone number and the message.
        */
        if($response->getStatusCode()==202 || (string) $response->getBody()=='0: Accepted for delivery'){
            $notification=new SMSPasswordNotification;
            $notification->message=$msg;
            $notification->phone_no=$request->phone_no;
            $notification->sender=Auth::user()->username;
            $notification->save();
            $request->session()->flash('status', 'SMS successfully sent to '.$emp_name.' by Phone no '.$request->phone_no.'!');
            return redirect('/sms-password-notification');
        }
    }
    /**
     * Generate randome password using faker
     * 
     */
    public function generate_password(Faker $faker){
       
        return  $faker->password;
    }
}
