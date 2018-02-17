<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
            }            
          }
          $this->info("Tabel Updated"); 
    }
}
