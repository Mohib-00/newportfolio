<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogsDetail extends Model
{
    protected $fillable = [
        'image',
        'name',
        'heading',

        'slug',
    ];
}
