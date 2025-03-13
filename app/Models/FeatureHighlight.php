<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureHighlight extends Model
{
    protected $fillable = [ 
        'image', 
        'heading', 
        'paragraph', 
        'slug',
    ];
}
