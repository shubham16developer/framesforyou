<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'user_id',
        'msg',
        'user_to',
        'user_from',
        'is_delete',
    ];

    public function msg_from()
    {
        return $this->belongsTo('App\Models\User', 'user_from', 'id');
    }

    public function msg_to()
    {
        return $this->belongsTo('App\Models\User', 'user_to', 'id');
    }

}
