<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/RoomType.php



class RoomType extends Model
{
    protected $fillable = ['name', 'capacity', 'rent_per_night', 'description','hotel_id'];

public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // Define the relationship with room images
    public function roomImages()
    {
        return $this->hasMany(RoomImages::class, 'room_type_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
