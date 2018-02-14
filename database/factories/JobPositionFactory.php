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

$factory->define(App\JobPosition::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'operation_class' =>$faker->randomElement(['head office' ,'branch', 'both']),
        // 'created_at' =>$faker->dateTime($max = 'now', $timezone = 'EAT'), // secret
        // 'updated_at' =>$faker->dateTime($max = 'now', $timezone = 'EAT'),
    ];
});
