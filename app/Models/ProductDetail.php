<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading', 
        'sub_heading', 
        'paragraph', 
        'image', 
        'detail_heading', 
        'detail_paragraph', 
        'slug',
    ];
}
