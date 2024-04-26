<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    protected $fillable = ['email', 'password'];

    public function profile(): HasMany
    {
        return $this->hasMany(Profile::class);
    }
}
