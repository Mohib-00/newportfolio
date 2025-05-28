<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'sub_heading_sub_image',
        'sub_paragraph',
        'slug',
        'sub_image',
        'sub_heading'
    ];
}
