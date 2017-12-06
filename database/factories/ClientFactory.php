<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
	$gender = $faker->randomElement(['male', 'female', 'others']);

    return [
        //
        'name' => $faker->name($gender),
        'gender' => $gender,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'nationality' => $faker->country,
        'education' => $faker->randomElement(['MS', 'BTECH', 'MBA']),
        'preferred_contact_mode' => $faker->randomElement(['email', 'phone', 'none'])
    ];
});
