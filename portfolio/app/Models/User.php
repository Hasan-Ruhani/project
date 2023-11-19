<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'confirm_password', 'otp'];
    protected $attributes = [
        'otp' => '0'
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
