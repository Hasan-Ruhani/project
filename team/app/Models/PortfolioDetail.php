<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PortfolioDetail extends Model
{
    use HasFactory;

    public function portfolioItem(): HasOne
    {
        return $this->hasOne(PortfolioItem::class);
    }
}
