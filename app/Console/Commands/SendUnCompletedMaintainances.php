<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendUnCompletedMaintainances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uncompleted_maintainances:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for the manger about maintainances that there due date is passed';

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
        
    }
}
