<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section7detail extends Model
{
    protected $table = 'section7details';
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
