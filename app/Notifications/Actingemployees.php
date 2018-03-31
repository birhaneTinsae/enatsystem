<?php

namespace App\Notifications;
use App\ActingEmployee;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use App\User;
use App\JobPosition;
use App\Branch;
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
      $aemployee= DB::table('acting_employees')            
             ->join('branches', 'branches.id', '=', 'acting_employees.branch_id')    
             ->join('users', 'users.id', '=', 'acting_employees.user_id')       
              ->join('job_positions', 'job_positions.id', '=', 'acting_employees.job_position_id')  
               ->where('duration','>=',5)
               ->where('remark', '=','1')
                ->where('status', '=','1')         
              ->select('acting_employees.*', 'users.name as full_name','branches.branch_name','job_positions.name as job_name')
            ->get();
  return (new MailMessage)->view('hr\acting-employee.email',['employees'=>$aemployee]);

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
