<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Booking;
use App\Model\Hotel;
use App\Model\Room;
use App\User;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'hotel_id' => function() {
            return Hotel::all()->random();
        },
        'room_id' => function() {
            return Room::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        },
        'issue_date' => $faker->dateTimeBetween('now', '+2 years'),
        'duration' => $faker->randomDigitNotNull
    ];
});
