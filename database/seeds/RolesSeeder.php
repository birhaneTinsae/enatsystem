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
                'create-user'=>true,
            ]),

        ]);

        $branch=Branch::create([
            'branch_code'=>'004',
            'branch_name'=>'Head office'
        ]);
        $job=JobPosition::create([
            'name'=>'Junior System admin',
            'operation_class'=>'head office'
        ]);

        $employee=Employee::create([
            'user_id'=>1,
            'job_id'=>1
           
        ]);
    }
}
