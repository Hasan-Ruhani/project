<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $fillable = ['name', 'designation', 'description', 'image', 'social_link1', 'social_link2', 'social_link3'];
}
