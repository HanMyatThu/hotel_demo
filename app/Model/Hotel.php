<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $guarded = [];
}
