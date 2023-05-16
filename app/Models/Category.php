<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
 
    protected $fillable = [
        'cat_name',
        'is_delete',
    ];

    public function product_category()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }

}
