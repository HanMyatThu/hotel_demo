<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function Hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
