<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleAdmin=Role::create(["name"=>"admin"]);
$permissions=array();
$permissions[1]=Permission::create(["name"=>"create domain"]);
$permissions[2]=Permission::create(["name"=>"update domain"]);
$permissions[3]=Permission::create(["name"=>"delete domain"]);
$permissions[4]=Permission::create(["name"=>"view domain"]);
$permissions[5]=Permission::create(["name"=>"create maintainance"]);
$permissions[6]=Permission::create(["name"=>"update maintainance"]);
$permissions[7]=Permission::create(["name"=>"delete maintainance"]);
$permissions[8]=Permission::create(["name"=>"view maintainance"]);
$permissions[9]=Permission::create(["name"=>"create tt"]);
$permissions[10]=Permission::create(["name"=>"update tt"]);
$permissions[11]=Permission::create(["name"=>"delete tt"]);
$permissions[12]=Permission::create(["name"=>"view tt"]);

$permissions[13]=Permission::create(["name"=>"create fgtg"]);
$permissions[14]=Permission::create(["name"=>"update fgtg"]);
$permissions[15]=Permission::create(["name"=>"delete fgtg"]);
$permissions[16]=Permission::create(["name"=>"view fgtg"]);

$permissions[17]=Permission::create(["name"=>"create network"]);
$permissions[18]=Permission::create(["name"=>"update network"]);
$permissions[19]=Permission::create(["name"=>"delete network"]);
$permissions[20]=Permission::create(["name"=>"view network"]);
$roleAdmin->syncPermissions($permissions);

        $roleSupport=Role::create(["name"=>"support"]);
    //   $permissionsCollection=collect($permissions)->filter(function(){

    //   });
    }
}
