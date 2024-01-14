<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;
    protected $table = 'room_booking';
    protected $fillable = [
        'room_type',
        'client_name',
        'client_username',
        'client_id',
        'room_number'
    ];
}
