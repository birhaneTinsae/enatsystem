<?php

/**
 * @author Birhane Tinsae<btinsae@enatbanksc.com>
 * 
 * @copyright Enat Bank S.C.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMSPasswordNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv')->create('s_m_s_password_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->string('phone_no');
            $table->string('sender');
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
        Schema::connection('sqlsrv')->dropIfExists('s_m_s_password_notifications');
    }
}
