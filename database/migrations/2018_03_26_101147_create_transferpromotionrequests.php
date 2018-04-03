<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferpromotionrequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv')->create('transferpromotionrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('from_job_position');
            $table->unsignedInteger('to_job_position');
            $table->unsignedInteger('from_branch');  
            $table->unsignedInteger('to_branch');                        
            $table->date('date');
            $table->text('reason');
            $table->text('remark');           
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('from_job_position')->references('id')->on('job_positions');
            $table->foreign('to_job_position')->references('id')->on('job_positions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlsrv')->dropIfExists('transferpromotionrequests');
    }
}
