<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Possession::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'zipcode' => $faker->randomDigit,
                'town' => $faker->city,
    ];
});
