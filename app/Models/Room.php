<?php

namespace App\Models;

use App\Models\RoomImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
class Room extends Model
{
    protected $fillable = ['room_no', 'telephone', 'meal', 'status', 'room_type_id'];

    // Define the relationship with RoomType
    // public function roomType()
    // {
    //     return $this->belongsTo(RoomType::class);
    // }

    public function oneImg(){
        return $this->hasOne('App\Models\RoomImages', 'room_id', 'id');
    }
    public function bookings()
{
    return $this->hasMany(Booking::class, 'room_number');
}

    public function AllImg(){
        return $this->hasMany('App\Models\RoomImages', 'room_id', 'id');
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }


    // Define the relationship with room images
    public function roomImages()
    {
        return $this->hasOne(RoomImages::class, 'room_type_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
    public function findstatus(){
        return $this->hasMany('App\Models\Roomstatus', 'room_id', 'id');
    }
}
