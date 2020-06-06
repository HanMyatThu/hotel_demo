<?php

use Illuminate\Http\Request;

Route::apiResource('/hotels', 'HotelController');

Route::apiResource('/hotels/{hotel}/rooms', 'RoomController');


Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register','AuthController@register');
});
