<?php

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isHotelInWishlist')) {
 function isLikedBy(User $user)
{
    return Wishlist::where('guest_id', $user->id)
        ->where('hotel_id', $this->id)
        ->exists();
}

}
