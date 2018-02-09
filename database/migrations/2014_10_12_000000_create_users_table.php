<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone_no');
            $table->integer('branch_id')->unsigned();
          //  $table->unsignedInteger('employee_id');    
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->foreign('branch_id')->references('id')->on('branches');
         //   $table->foreign('employee_id')->references('id')->on('employees');
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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropForeign('users_branch_id_foreign');
        // });
        Schema::dropIfExists('users');
    }
}
