<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PortfolioItem extends Model
{
    protected $fillable = ['title', 'short_des', 'category_id', 'image'];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
