<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomstatus extends Model
{
    use HasFactory;
    protected $table = 'room_status';
    protected $fillable = [
        'room_id',
        'assign_id',
        'status'

    ];
}
