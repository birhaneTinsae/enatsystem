<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpeDepreciations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv2')->create('ppe_depreciations', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->date('calculation_date');
             $table->string('book_value');
             $table->string('maker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppe_depreciations');
    }
}
