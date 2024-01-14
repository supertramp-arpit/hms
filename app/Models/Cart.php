<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{ protected $fillable = [
    'guest_id',
    'room_number',
    'room_type',
    'check_in_date',
    'check_out_date',
    'total_price',
];
public function guest()
{
    return $this->belongsTo(\App\Models\Guest::class);
}

    use HasFactory;
}
