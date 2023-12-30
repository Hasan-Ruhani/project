<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['related_id', 'filename'];

    // If you have a relationship, for example, with a Product model, you can define it here
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
