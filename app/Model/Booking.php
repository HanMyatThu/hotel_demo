<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function Hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function Room()
    {
        return $this->belongsTo(Room::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
