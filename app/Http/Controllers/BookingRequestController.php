<?php

namespace App\Http\Controllers;

use App\Model\BookingRequest;
use App\Model\Booking;
use App\Http\Resources\BookingRequestResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingRequestResource::collection(BookingRequest::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BookingRequest  $bookingRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BookingRequest $bookingRequest)
    {
        return new BookingRequestResource($bookingRequest);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BookingRequest  $bookingRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingRequest $bookingRequest)
    {
        $bookingRequest->update($request->all());
        return response(['error'=> false ,'message' => 'created successfully'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BookingRequest  $bookingRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingRequest $bookingRequest)
    {
        $bookingRequest->delete();
        return response(['error'=> false ,'message' => 'booking deleted'],Response::HTTP_OK);
    }
}
