<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\User;
use App\Employee;
use App\MessageTemplete;
use App\SMSPasswordNotification;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
class SMSPasswordNotificationController extends Controller
{
    /**
     * TODO:
     * -correct the dfajdflka
     */
    public function index(){
        // $notifications=SMSPasswordNotification::paginate(10);
       return view('notification.notification');
   
    }
    public function notifications(){
        $notifications=SMSPasswordNotification::paginate(10);
        // return view('notification.notification',['notifications'=>$notifications]);
        return response()->json($notifications);
    }
    
    /***
     * FIXME:
     * -filter notification based on sender and sent time.
     */
    public function filter(Request $request){
     
        $notifications=SMSPasswordNotification::where('sender',$request->sender ?? '')
              ->whereBetween('sent_at',[$request->from_date??now()->toDateString(),$request->to_date??now()->toDateString()])->paginate(10);
       return view('notification.notification',['notifications'=>$notifications]);
    }

    /**
     * 
     */
    public function create(){
        $branches=Branch::orderBy('name')->pluck('name','id');
      
        $msg_templetes=MessageTemplete::all()->pluck('name','id');
        return view('notification.new',['branches'=>$branches,'msg_templetes'=>$msg_templetes]);
    }

    /**
     * Send the SMS given 'Phone Number' and 'Message Content'.
     */
    public function send_password_reset_sms(Request $request){


        //to fetch employee name having employee id.
        $emp_name=Employee::findOrFail($request->employee)->name;

        //formatted message containing employee full name,password and current date 
        $msg=sprintf($request->msg,$emp_name,$request->password,now()->toFormattedDateString());

        if($this->send_SMS($msg,$request->phone_no)){
            $request->session()->flash('status', 'SMS successfully sent to Phone no '.$request->phone_no.'!');
            return redirect('/sms-password-notification');
        }
       
    }

    /**
     * 
     */
    public function send_one_time_sms(Request $request){
       if($this->send_SMS($request->msg,$request->phone_no)){
        $request->session()->flash('status', 'SMS successfully sent to Phone no '.$request->phone_no.'!');
        return redirect('/sms-password-notification');
       }
    }
    /**
     * 
     */
    public function one_time_sms(){
        return view('notification.one_time_sms');
    }
    /**
     * Generate randome password using faker
     * 
     */
    public function generate_password(Faker $faker){
       
        return  $faker->password;
    }

    /**
     * 
     */
    public function send_SMS($msg,$phone_no){
        $client = new Client();


        $response=  $client->get('http://10.1.12.156:13013/cgi-bin/sendsms',[
        'query' => ['username' => 'enat','password'=>'enat','text'=>$msg,'to'=>$phone_no,'charset'=>'utf-8','coding'=>'2']
        ]);
  
    /**
    * check if the response is ok and store the notification log to the database including who send the notification,receiver's phone number and the message.
    */
    if($response->getStatusCode()==202 || (string) $response->getBody()=='0: Accepted for delivery'){
        $notification=new SMSPasswordNotification;
        $notification->message=$msg;
        $notification->phone_no=$phone_no;
        $notification->sender=Auth::user()->username;
        $notification->sent_at=now();
        if($notification->save()){
           return true;
        }
       return false;
    }
    }
}
