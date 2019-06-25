<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFourGThreeGMaintainancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('four_g_three_g_maintainances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('employee_id');
            $table->enum('service_type',['DATA','INTERNET','GPRS']);
            $table->string('service_no');
            $table->string('imei_no');
            $table->string('serial_no');
            $table->string('sim_card_iccid_no');
            $table->string('remarks')->nullable();
            $table->enum('connection_type',['3G','4G','EV-DO']);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('four_g_three_g_maintainances');
    }
}
