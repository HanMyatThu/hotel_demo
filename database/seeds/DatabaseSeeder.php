<?php

use App\Model\Booking;
use App\Model\BookingRequest;
use App\Model\Hotel;
use App\Model\Room;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,5)->create();
        factory(Hotel::class,5)->create();
        factory(Room::class,100)->create();
        factory(Booking::class,5)->create();
        factory(BookingRequest::class,5)->create();
    }
}
