<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\BookingRequest;
use App\Model\Hotel;
use App\User;
use Faker\Generator as Faker;

$factory->define(BookingRequest::class, function (Faker $faker) {
    $roomType = ['Single Bedroom', 'Double Bedroom','Deluxe Room', 'Family Room'];
    $ran_keys = array_rand($roomType,1);
    return [
        'hotel_id' => function() {
            return Hotel::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        },
        'roomType' => $roomType[$ran_keys],
        'status' => 'open',
        'issue_date' => $faker->dateTimeBetween('now', '+2 years'),
        'duration' => $faker->randomDigitNotNull
    ];
});
