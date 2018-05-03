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
    //     $results = DB::table('acting_employees')
    //             ->where('duration', '>=', 5)
    //              ->where('status', '=', 1)
    //               ->where('notification', '=',1)
    //             ->get();
    //   //  $results=ActingEmployee::paginate(10);
    //    $count=0;
    //    $Employee_name=array();
    //    $fjob_name=array();
    //    $tjob_name=array();
    //    $fbranch_name=array();
    //    $tbranch_name=array();
    //   foreach($results as $result){
    //      //$Employee_name[$count]= DB::table('users')->where('id',$result->employee_id)->value('name');
    //     $fjob_name[$count]= DB::table('job_positions')->where('id', $result->job_position_id)->value('name');
    //     $tjob_name[$count]= DB::table('job_positions')->where('id', $result->acting_job_position_id)->value('name');
    //     $fbranch_name[$count]= DB::table('branches')->where('id', $result->branch_id)->value('branch_name');
    //     $tbranch_name[$count]= DB::table('branches')->where('id', $result->acting_branch_id)->value('branch_name');
    //     $count++;
    //   }
      $results= DB::table('acting_employees')            
             ->join('branches', 'branches.id', '=', 'acting_employees.branch_id')  
             ->join('branches as acting_branches', 'acting_branches.id', '=', 'acting_employees.acting_branch_id')  
             ->join('employees', 'employees.id', '=', 'acting_employees.employee_id')       
              ->join('job_positions', 'job_positions.id', '=', 'acting_employees.job_position_id')  
              ->join('job_positions as acting_job_positions', 'acting_job_positions.id', '=', 'acting_employees.acting_job_position_id')
               ->where('duration','>=',5)
               ->where('notification', '=','1')
                ->where('status', '=','1')         
              ->select('acting_employees.*', 'employees.full_name as full_name','branches.branch_name','job_positions.name as job_name'
              ,'acting_branches.branch_name as acting_branch_name','acting_job_positions.name as acting_job_name')
            ->get();
  return (new MailMessage)->view('hr\acting-employee.email',['employees'=>$results]);

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
