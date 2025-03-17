<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogsSection extends Model
{
    protected $fillable = [
        'heading',
        'paragraph',
        'slug',
    ];
}
