<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActingEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acting_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('employee_name');
            $table->text('job_position');            
            $table->text('home_branch');
            $table->text('acting_job_position');
            $table->text('acting_branch_name');
            $table->date('start_date');            
            $table->date('end_date');
            $table->text('maker');
            $table->text('status');
            $table->softDeletes('deleted_at');
            $table->foreign('user_id')->references('id')->on('users');
           /*  $table->foreign('job_id')->references('id')->on('job_positions');            
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('acting_branch_id')->references('id')->on('branches'); */
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
        Schema::dropIfExists('acting_employees');
    }
}
