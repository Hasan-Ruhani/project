<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PortfolioDetail extends Model
{
    protected $fillable = [
        'category_id',
        'head_line',
        'short_des',
        'description',
        'client',
        'date',
        'project_url',
        'front_img'
    ];
    public function category(): BelongsTo   // This means many portfolio falls under one category.
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'portfolio_id');
    }

}
