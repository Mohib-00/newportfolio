<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureBanners extends Model
{
    protected $fillable = [
        'heading', 
        'sub_heading', 
        'paragraph', 
        'image', 
        'detail_heading', 
        'detail_paragraph', 
        'slug',
    ];
}
