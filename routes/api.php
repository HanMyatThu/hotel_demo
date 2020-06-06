<?php

//should be admin / user.admin private routes

Route::apiResource('/hotels', 'HotelController');

Route::apiResource('/hotels/{hotel}/rooms', 'RoomController');

Route::apiResource('/bookings', 'BookingController');

Route::apiResource('/bookingRequests', 'BookingRequestController');

//should be user private routes

Route::post('/user/bookingRequests', 'UserBookingController@createBooking');

Route::get('/user/bookingRequests', 'UserBookingController@getBookings');

Route::get('/user/bookingRequests/{bookingRequest}', 'UserBookingController@getBooking');

Route::patch('/user/bookingRequests/{bookingRequest}','UserBookingController@updateBooking');


Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register','AuthController@register');
});
