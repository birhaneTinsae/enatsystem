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
            
            
            $table->string('username')->unique();
            $table->unsignedInteger('employee_id'); 
            $table->boolean('first_login')->default(1);   
           
            $table->string('password');
            $table->rememberToken();
           
            $table->foreign('employee_id')->references('id')->on('employees');
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
