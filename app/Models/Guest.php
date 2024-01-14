<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guest extends Authenticatable
{    use Notifiable;

    protected $table = 'guests'; // Make sure the table name matches

    protected $fillable = ['name',
    'id_proof',
    'email',
  'mobile',
'password',
'profile_picture',
'otp',
'created_at',
'updated_at',];

    public function getAuthIdentifierName()
    {
        return 'email'; // The column name that should be used as the user identifier
    }

    public function getAuthPassword()
    {
        return $this->password; // The column name that stores the hashed password
    }

    public function getRememberToken()
    {
        return $this->remember_token; // The column name that stores the "remember me" token
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // Your model-specific methods and properties
}

