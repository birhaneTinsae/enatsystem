<?php

<<<<<<< HEAD
=======
/**
 * @author Birhane Tinsae<btinsae@enatbanksc.com>
 * 
 * @copyright Enat Bank S.C.
 */

>>>>>>> f9eed50aca28a49caac929cebb6cf6bcd57256c5
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
        Schema::create('s_m_s_password_notifications', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
=======
            $table->text('message');
            $table->string('phone_no');
            $table->string('sender');
>>>>>>> f9eed50aca28a49caac929cebb6cf6bcd57256c5
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
        Schema::dropIfExists('s_m_s_password_notifications');
    }
}
