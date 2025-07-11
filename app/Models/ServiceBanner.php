<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'sub_heading',
        'slug',
    ];
}
