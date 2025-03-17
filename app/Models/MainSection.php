<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSection extends Model
{
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'sub_heading',
    ];
}
