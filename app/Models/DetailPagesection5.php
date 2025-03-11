<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPagesection5 extends Model
{
    protected $table = 'detail_pagesection5s';
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
