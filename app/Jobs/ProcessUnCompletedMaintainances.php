<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\UnCompletedMaintainancesNotification;

class ProcessUnCompletedMaintainances implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $user=\App\User::where('username','aalemayehu')->first();
        $maintainances=\App\Model\MaintainanceInfo::where('completion_date','<',now()->today())
        ->andWhere('status','!=',"COMPLETED")->get();
        
        $user->notify(new UnCompletedMaintainancesNotification($maintainances));
    }
}
