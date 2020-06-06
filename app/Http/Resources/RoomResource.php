<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'roomNo' => $this->roomNo,
            'type'=> $this->type,
            'fees' => '$'.$this->fees,
            'created_at' => $this->created_at
        ];
    }
}
