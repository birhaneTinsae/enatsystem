<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_t_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id');
            $table->timestamp('registered_at')->nullable();
            $table->timestamp('reconnected_at')->nullable();
            $table->timestamp('disconnected_at')->default(now());
            $table->string('follow_up_no');
            $table->enum('status',['OPEN','INPROGRESS','COMPLETED']);
            $table->string('remarks')->nullable();
            $table->bigInteger('time_taken')->nullable();
            $table->enum('escalation',['LEVEL1','LEVEL2','LEVEL3','LEVEL4','LEVEL5']);
            $table->string('reported_by');           
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
        Schema::dropIfExists('t_t_registers');
    }
}
