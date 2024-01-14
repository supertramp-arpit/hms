<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    use HasFactory;
    protected $table = 'room_images';
    protected $fillable = [
        'room_type_id',
        'images'

    ];
}




class RoomImage extends Model
{
    protected $fillable = ['images', 'room_type_id'];

    // Define the relationship with RoomType
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

}
