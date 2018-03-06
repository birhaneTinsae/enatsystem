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
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'job_position_id' => $faker->numberBetween($min = 1, $max = 20), // secret
        'employed_date' =>$faker->dateTime($max = 'now', $timezone = 'Africa/Addis_Ababa'),
    ];
});
