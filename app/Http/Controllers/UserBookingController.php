<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingRequestResource;
use App\Model\BookingRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\SendGrip;

class UserBookingController extends Controller
{
      /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function getBookings()
    {
        $authUser = auth()->user();
        $bookingrequests = $authUser->bookingRequests;
        return BookingRequestResource::collection($bookingrequests);
    }

    public function createBooking(Request $request)
    {
        BookingRequest::create($request->all());
        $authUser = auth()->user();
        $sendgrip = new SendGrip();
        $sendgrip->sendEmail($authUser->email,$authUser->name);
        return response(['error'=> false ,'message' => 'Booking request created successfully'], Response::HTTP_OK);
    }

    public function getBooking(BookingRequest $bookingRequest)
    {
        $authUserId = auth()->user()->id;
        if($authUserId !== $bookingRequest->user_id) {
            return response(['error'=> true ,'message' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
        }
        return new BookingRequestResource($bookingRequest);
    }

    public function updateBooking(BookingRequest $bookingRequest,Request $request)
    {
        $bookingRequest->update($request->all());
        return response(['error'=> false ,'message' => 'created successfully'],Response::HTTP_OK);
    }
}
