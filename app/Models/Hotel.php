<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [

        'name',
        'address',
        'state',
        'city',
        'stars',
        'status',
        'adminuser_type'
    ];

    public function roomType()
    {
        return $this->hasMany(RoomType::class, 'hotel_id');
    }
    public function roomTypes() {
        return $this->hasMany(RoomType::class);
    }
    public function images()
    {
        return $this->hasMany(HotelImage::class, 'hotel_id');
    }
    public function likes()
    {
        // Define the relationship between users and likes
        return $this->belongsToMany(User::class,  'hotel_id', 'user_id');
    }

    public function isLikedByUser()
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Check if the user has liked this hotel
        return Wishlist::where('guest_id', $userId)
            ->where('hotel_id', $this->id)
            ->exists();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'hotel_id');
    }
}
