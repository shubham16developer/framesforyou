<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
 
    protected $fillable = [
        'product_name',
        'category_id',
        'color_id',
        'description',
        'image',
        'price',
        'is_delete',
    ];

    public function product_category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function product_color()
    {
        return $this->belongsTo('App\Models\Color', 'color_id', 'id');
    }

}
