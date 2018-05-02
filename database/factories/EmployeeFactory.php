<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        // 'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'job_position_id' => $faker->numberBetween($min = 1, $max = 20), 
        'salary'=>$faker->numberBetween($min = 1000, $max = 9000),// secret
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_no'=>$faker->phoneNumber,
        'sex'=>$faker->randomElements(['M', 'F'])[0],
        'enat_id'=>'EB-'.$faker->numberBetween($min = 1, $max = 20),
        'branch_id'=> $faker->numberBetween($min = 1, $max = 20) ,
        'employed_date' =>$faker->dateTime($max = 'now', $timezone = 'Africa/Addis_Ababa'),
    ];
});
