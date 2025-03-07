<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail6 extends Model
{
    protected $table = 'detail6s';
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
