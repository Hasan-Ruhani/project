<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'subject', 
        'message',
        'user_id'
    ];

    // public function user(): BelongsTo
    // {
    //     return $this->BelongsTo(User::class);
    // }
}
