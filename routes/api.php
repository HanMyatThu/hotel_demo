<?php

use Illuminate\Http\Request;

Route::apiResource('/hotels', 'HotelController');

Route::apiResource('/hotels/{hotel}/rooms', 'RoomController');
