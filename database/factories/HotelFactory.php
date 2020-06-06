<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    $hotelStars = ['3 star', '4 star','5 star'];
    $ran_keys = array_rand($hotelStars,1);
    return [
        'name' => $faker->company,
        'type' => $hotelStars[$ran_keys],
        'phone'=> $faker->phoneNumber,
        'location'=> $faker->streetAddress,
        'city'=> $faker->city,
        'country'=>$faker->country
    ];
});
