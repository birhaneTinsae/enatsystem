<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintainanceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintainance_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id');
            $table->date('received_at');
            $table->enum('item',['SYSTEM UNIT','ROUTER','LAPTOP','PRINTER','OTHER']);
            $table->enum('problem_type',['OPERATING SYSTEM','HARD DISK','POWER SUPPLY','MEMORY','MOTHERBOARD','CIMOS BATTERY','OTHER']);
            $table->enum('action',['REPAIR','REINSTALLATION','REPLACEMENT','OTHER']);
            $table->date('completion_date')->nullable();
            $table->enum('status',['RECEIVED','ASSIGNED','ESCALATED','OUTSOURCED','INPROGRESS','COMPLETED']);
            $table->string('remarks')->nullable();
            $table->string('received_by');
            $table->bigInteger('time_taken')->nullable();
            $table->string('assigned_to')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

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
        Schema::dropIfExists('maintainance_infos');
    }
}
