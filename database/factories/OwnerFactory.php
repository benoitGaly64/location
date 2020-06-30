<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\owner;
use Faker\Generator as Faker;

$factory->define(owner::class, function (Faker $faker) {
    return [
        'gender'        => $faker->title,
        'lastname'      => $faker->name,
        'firstname'     => $faker->firstName,
        'email'         => $faker->email,
        'address'       => $faker->address,
        'zipcode'       => $faker->randomNumber($nbDigits = 5),
        'city'          => $faker->city,
        'phone'         => $faker->phoneNumber,
        'date_of_birth' => $faker->date
    ];
});
