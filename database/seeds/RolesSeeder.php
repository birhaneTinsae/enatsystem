<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Branch;
use App\JobPosition;
use App\Employee;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'permissions'=>json_encode([
<<<<<<< HEAD
                'create-user'=>true,
                'create-employee'=>true,
                'update-employee'=>true,
                'delete-employee'=>true,
                'view-employee'=>true,
=======
                "create-user"=>true,
                "create-employee"=>true,
                "update-employee"=>true,
                "delete-employee"=>true,
                "view-employee"=>true,
                "create-role"=>true,
                "view-hr"=>true,
                "view-sms"=>true,
                "view-vms"=>true,
                "view-fam"=>true,
                "view-fcy"=>true,
>>>>>>> f9eed50aca28a49caac929cebb6cf6bcd57256c5
                
            ]),

        ]);

        
        

      
    }
}
