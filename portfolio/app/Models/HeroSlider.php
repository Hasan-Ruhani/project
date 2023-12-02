<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [ 
                            'head_line',
                            'short_des',
                            'hero_img',
                            'about_link',
                            'hire_link'
                          ];
}
