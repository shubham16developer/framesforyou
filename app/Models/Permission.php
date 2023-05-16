<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'add_group',
        'edit_group',
        'delete_group',
        'add_user',
        'edit_user',
        'delete_user',
        'add_manager',
        'edit_manager',
        'delete_manager',
        'add_lead',
        'edit_lead',
        'delete_lead',
        'add_media',
        'edit_media',
        'delete_media',
        'add_role',
        'edit_role',
        'delete_role',
        'assign_role',
        'ivr',
        'call_log',
        'whatsapp',
    ];

}
