<?php

use Faker\Generator as Faker;

$factory->define(App\System::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->userName
    ];
});
