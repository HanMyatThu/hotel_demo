<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Hotel;
use App\Model\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    $roomType = ['Single Bedroom', 'Double Bedroom','Deluxe Room', 'Family Room'];
    $ran_keys = array_rand($roomType,1);
    return [
        'hotel_id' => function() {
            return Hotel::all()->random();
        },
        'roomNo' => $faker->numberBetween($min = 100, $max = 800),
        'status' => 'open',
        'type' => $roomType[$ran_keys],
        'fees' => $faker->numberBetween($min = 10, $max = 100),
    ];
});
