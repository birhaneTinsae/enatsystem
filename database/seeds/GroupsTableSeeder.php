<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('groups')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@example.com',
            'maker' => str_random(10),
        ]);

    }
}
