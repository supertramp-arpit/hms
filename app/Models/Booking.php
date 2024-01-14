<?php

namespace App\Models;
// app/Booking.php



use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_id',
        'room_number',
        'room_type',
        'check_in_date',
        'check_out_date',
        'total_price',
    ];




    public function bookings()
{
    return $this->hasMany(Booking::class, 'guest_id');
}
public function guest()
{
    return $this->belongsTo(\App\Models\Guest::class);
}

public function roomType()
{
    return $this->belongsTo(\App\Models\RoomType::class, 'room_type', 'name');
}

public function room()
{
    return $this->belongsTo(\App\Models\Room::class, 'room_number', 'room_number');
}
public function payment()
{
    return $this->hasOne(Payment::class);
}

}
