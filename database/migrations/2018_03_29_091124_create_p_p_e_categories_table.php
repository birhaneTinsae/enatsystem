<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePPECategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv2')->create('p_p_e_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_p_e_type');
            $table->integer('useful_life');
            $table->integer('residual_value');
            $table->string('depreciation_method')->nullable();
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
        Schema::connection('sqlsrv2')->dropIfExists('p_p_e_categories');
    }
}
