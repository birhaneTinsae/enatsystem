<?php

namespace App\Console\Commands;
use App\User;
use App\Group;
use Notification;
use Carbon\Carbon ;
use App\Mail\NotifyHr;
use App\Notifications\Actingemployees;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\ActingEmployee;
class UpdateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
         $currentdate = date('Y-m-d');
          $result = DB::table('acting_employees')
          ->where('status', '=','1')->get();
          $check=count($result);
          if($check>=1){
            foreach($result as $res){
                DB::table('acting_employees')
            ->where('id', $res->id)
            ->update(['end_date' =>$currentdate]);
                 $sdate = $res->start_date;
                 $edate = $res->end_date;
                 $ts1 = strtotime($sdate);
                 $ts2 = strtotime($edate);
                 $year1 = date('Y', $ts1);
                 $year2 = date('Y', $ts2);
                 $month1 = date('m', $ts1);
                 $month2 = date('m', $ts2);
                 $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
             DB::table('acting_employees')
            ->where('id', $res->id)
            ->update(['duration' =>$diff]);                  
            }
            $aemployee = DB::table('acting_employees')
          ->where('duration','>=',5)
          ->where('status', '=','1')->get();
              $check1=count($aemployee);
              if($check1>=1){                 
                 DB::table('jobs')->delete();                                                                         
                   $when = Carbon::now()->addSeconds(20);
                  Notification::send(Group::find(2), new Actingemployees());                                             
                  $this->info("Notification Sent"); 
              }
              else{
                 $this->info("Tabel Updated"); 
                 $this->info("Notification Not Required");
              }
               
          }
           else{
                $this->info("No Record to be Updated Updated"); 
              }
         
         
    }
}
