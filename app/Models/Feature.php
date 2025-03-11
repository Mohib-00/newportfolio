<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'fatures';
    protected $fillable = ['heading','paragraph', 'image', 'links']; 
}
