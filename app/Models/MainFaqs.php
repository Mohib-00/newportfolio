<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainFaqs extends Model
{
    protected $fillable = [
        'question',
        'answer',
    ];
}
