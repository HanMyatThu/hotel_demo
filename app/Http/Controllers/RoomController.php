<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Model\Hotel;
use App\Model\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hotel $hotel)
    {
        return RoomResource::collection($hotel->rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Hotel $hotel,Request $request)
    {
        $room = $hotel->rooms()->create($request->all());
        return response(new RoomResource($room), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel,Room $room)
    {
        return new RoomResource($room);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Hotel $hotel,Request $request, Room $room)
    {
        $room->update($request->all());
        return response(['error'=> false ,'message' => 'updated successfully'], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel,Room $room)
    {
        $room->delete();
        return response(['error'=> false ,'message' => 'deleted successfully'], Response::HTTP_OK);
    }
}
