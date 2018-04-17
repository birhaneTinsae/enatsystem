<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv2')->create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('effective_date');
            $table->unsignedInteger('from_employee');
            $table->unsignedInteger('to_employee');
            $table->unsignedInteger('asset_id');
            $table->string('remarks')->nullable();
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
         //   $table->foreign('from_employee')->references('id')->on('employees')->onDelete('cascade');
           // $table->foreign('to_employee')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::connection('sqlsrv2')->dropIfExists('transfers');
    }
}
