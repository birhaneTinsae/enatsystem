<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public  function up()
    {
        Schema::connection('sqlsrv2')->create('asset_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('p_p_e_category_id');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('overrided_useful_life')->nullable();
            $table->integer('overrided_residual_value')->nullable();
            $table->foreign('p_p_e_category_id')->references('id')->on('p_p_e_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public  function down()
    {
        Schema::connection('sqlsrv2')->dropIfExists('asset_items');
    }
}
