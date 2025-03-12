<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureBanners extends Model
{
    protected $table = 'feature_banners';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'sub_image',
        'sub_heading',
        'sub_paragraph',
        'slug',
    ];
}
