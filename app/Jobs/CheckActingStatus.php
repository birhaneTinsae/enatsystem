<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use Illuminate\Support\Facades\DB;
class CheckActingStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $actingEmployee;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $employees = DB::table('acting_employees')
                ->whereDate('from_date','>=', now()->subMonths(5))
                ->get();

          //check to see if there is acting employee whoes acting period greater than or equals to 5 months.      
          if($employees->isNotEmpty())  {
           
                User::find(1)->notify(new HRNotification($employees));
            
          }    
       
    }
}
