<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    // Client.php (Model)
protected $fillable = ['name', 'email', 'username', 'id_proof', 'number', 'start_date', 'end_date', 'room_type'];

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }
}
