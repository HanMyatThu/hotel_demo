<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hotel' => $this->hotel->name,
            'room' => $this->room->roomNo,
            'user' => $this->user->name,
            'issue_date'=> $this->issue_date,
            'duration' => $this->duration.' days',
            'created_at' => $this->created_at
        ];
    }
}
