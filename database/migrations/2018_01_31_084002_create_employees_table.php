<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
<<<<<<< HEAD
            $table->unsignedInteger('job_id');
<<<<<<< HEAD
            $table->unsignedInteger('branch_id');
<<<<<<< HEAD
            $table->date('employed_date')->nullable();            
=======
=======
            // $table->unsignedInteger('branch_id');
>>>>>>> 194b3dbb38f1fc2b8198dc582537bb634b9dcd5f
=======
            $table->unsignedInteger('job_position_id');
>>>>>>> cd06e20aa66b55aa549da4ebe0ed8fcd41440914
            $table->date('employed_date');  
            $table->string('sub_city')->nullable() ;
            $table->string('kebele')->nullable() ;
            $table->string('woreda')->nullable() ;
            $table->string('house_no')->nullable() ;

<<<<<<< HEAD
>>>>>>> f9eed50aca28a49caac929cebb6cf6bcd57256c5
            $table->foreign('job_id')->references('id')->on('job_positions');
=======
            $table->foreign('job_position_id')->references('id')->on('job_positions');
>>>>>>> cd06e20aa66b55aa549da4ebe0ed8fcd41440914
            $table->foreign('user_id')->references('id')->on('users');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
