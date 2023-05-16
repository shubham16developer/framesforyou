<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
 
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'total_price',
        'added_status',
        'is_delete',
    ];

    public function cart_product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function cart_user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


}
