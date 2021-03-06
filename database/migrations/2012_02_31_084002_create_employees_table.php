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
            // $table->unsignedInteger('user_id');
            $table->unsignedInteger('job_position_id');
            $table->date('employed_date');  
            $table->string('salary');
            $table->string('name');
            $table->string('phone_no');
            $table->string('enat_id');
            $table->integer('branch_id')->unsigned();
            $table->string('email')->unique();
            $table->char('sex');
            $table->string('sub_city')->nullable() ;
            $table->string('kebele')->nullable() ;
            $table->string('woreda')->nullable() ;
            $table->string('house_no')->nullable() ;

            $table->foreign('job_position_id')->references('id')->on('job_positions');
            $table->softDeletes();
            $table->foreign('branch_id')->references('id')->on('branches');
           
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
