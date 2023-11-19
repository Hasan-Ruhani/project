<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'name', 
        'user_id', 
        'designation', 
        'description', 
        'image', 
        'facebook', 
        'github', 
        'linkedin'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
