<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';
 
    protected $fillable = [
        'id',
        'color_name',
        'is_delete'
    ];

    public function product_color()
    {
        return $this->hasMany('App\Models\Product', 'color_id', 'id');
    }

}
