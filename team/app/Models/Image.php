<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    protected $fillable = [
        'portfolio_id', 
        'filename'
    ];

    public function portfolioDetail()
    {
        return $this->belongsTo(PortfolioDetail::class, 'portfolio_id');
    }
}
