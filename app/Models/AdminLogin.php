<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminLogin extends Model
{
    use HasFactory;
    protected $table = 'adminusers';
    protected $fillable = [
        'email',
        'password',
        'type',
        'number',
        'password_reset_token',
        'name',
        'image',
        'status',
        'username',
    ];
    public function generatePasswordResetToken()
    {
        $token = Str::random(60);
        $this->password_reset_token = $token;
        $this->save();

        return $token;
    }
}
