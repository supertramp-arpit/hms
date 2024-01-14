<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
       'id',
        'name',
        'state_id',
        'cantary_code'
    ];
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

}
