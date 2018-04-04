<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asset_name');
            $table->date('purchase_date')->default(now());
            $table->double('gross_purchase_amount',15,3);
            $table->string('remarks')->nullable();
            $table->integer('book_value');
            $table->string('tag')->nullable();
            $table->unsignedInteger('asset_item_id');
            $table->unsignedInteger('branch_id');
            $table->boolean('disposed')->comment('whether item is disposed')->default(false);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('asset_item_id')->references('id')->on('asset_items')->onDelete('cascade');
            $table->integer('overrided_useful_life')->comment('to override useful life per item')->nullable();
            $table->integer('overrided_residual_value')->comment('to override residual life per item')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
