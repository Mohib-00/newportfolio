<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'paragraph',
        'logo',
        'facebook_link',
        'twitter_link',
    ];
}
