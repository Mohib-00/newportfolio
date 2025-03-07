<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailpagesection4 extends Model
{
    protected $table = 'detailpagesection4s';
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
