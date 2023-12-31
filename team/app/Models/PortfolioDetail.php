<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    public function portfolioDetail(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
