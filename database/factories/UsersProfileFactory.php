<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\UsersProfile;
use Faker\Generator as Faker;

$factory->define(UsersProfile::class, function (Faker $faker) {
    return [
        
        'address'       => $faker->address,
        'zipcode'       => $faker->randomNumber($nbDigits = 5),
        'city'          => $faker->city,
        'lastname'      => $faker->name,
        'firstname'     => $faker->firstName,
        'gender'        => $faker->title,
        'phone'         => $faker->phoneNumber,
        'date_of_birth' => $faker->date,
        'pic_path'      => '/storage/avatar/default.jpg',
    ];
});
