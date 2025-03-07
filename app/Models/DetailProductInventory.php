<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailProductInventory extends Model
{
    protected $table = 'detail_product_inventory_management';
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
