<?php

namespace App\Notifications;
use App\ActingEmployee;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
class Actingemployees extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
     $aemployee = DB::table('acting_employees')
          ->whereNull('remark')
          ->where('duration','>=','5')
          ->where('status', '=','1')->get();
          
      $result = DB::table('acting_employees')
          ->where('status', '=','1')
          ->where('duration', '>=','5')
          ->get();
           $check=count($result);
          if($check>=1){
            foreach($result as $res){
            DB::table('acting_employees')
            ->where('id', $res->id)
            ->update(['remark' =>"Notification sent"]);
            }
        }
            
  return (new MailMessage)->view('hr\acting-employee.email',['Aemployee'=>$aemployee]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
