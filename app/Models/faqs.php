<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faqs extends Model
{
    protected $table = 'faqs';
    protected $fillable = [
        'question',
        'answer',
        'slug',
    ];
}
