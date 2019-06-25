<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id');
            $table->string('cpe');
            $table->string('zone');
            $table->string('city');
            $table->string('service_type');
            $table->ipAddress('lan');
            $table->ipAddress('subnet_mask');
            $table->ipAddress('wan_ip');
            $table->ipAddress('router_wan_interface');
            $table->ipAddress('data_interface');
            $table->ipAddress('internet_interface');
            $table->ipAddress('managment_interface');
            $table->ipAddress('router_tunnel_0');
            $table->ipAddress('router_tunnel_100');
            $table->ipAddress('router_tunnel_200');
            $table->string('service_no');
            $table->string('link_speed');
            $table->string('msg_box_no');
            $table->macAddress('mac');
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
        Schema::dropIfExists('network_infos');
    }
}
