<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpecificReview extends Model
{
    protected $fillable = ['review', 'user_id', 'profile_id'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function spcReview(): BelongsTo
    {
        return $this->BelongsTo(Profile::class);
    }
}
