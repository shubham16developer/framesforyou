<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
        'password',
        'google2fa_secret',
        'two_fa',
        'number_id',
        'apiId',
        'is_delete'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setGoogle2faSecretAttribute($value)
    {
        if ($value == null || $value == '') {
            return '';
        } else {
            $user = User::where('google2fa_secret',$value)->first();
            if($user->two_fa !== '' || $user->two_fa !== '0'){
                $this->attributes['google2fa_secret'] = encrypt($value);
            }
        }
    }

    public function getGoogle2faSecretAttribute($value)
    {
        
        if ($value == null || $value == '') {
            return '';
        } else {
            $user = User::where('google2fa_secret',$value)->first();
            if($user->two_fa !== '' || $user->two_fa !== '0'){
                try {
                    decrypt($value);
                    return decrypt($value);
                } catch (\RuntimeException $e) {
                    return $value;
                }
            }
        }
    }

    public function group_manager()
    {
        return $this->hasMany('App\Models\Group', 'manager_id', 'id');
    }

    public function lead_manager()
    {
        return $this->hasMany('App\Models\Lead', 'manager_id', 'id');
    }

    public function user_assign()
    {
        return $this->belongsTo('App\Models\Number', 'number_id', 'id');
    }

    public function lead_assign_user()
    {
        return $this->hasMany('App\Models\LeadUsers', 'assign_user_id', 'id');
    }

    public function group_user_detail()
    {
        return $this->hasOne('App\Models\GroupUsers', 'user_id', 'id');
    }

    public function msg_from()
    {
        return $this->hasMany('App\Models\Massage', 'user_from', 'id');
    }

    public function msg_to()
    {
        return $this->hasMany('App\Models\Massage', 'user_to', 'id');
    }
}
