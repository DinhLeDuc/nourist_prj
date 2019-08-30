<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'username',
        'email',
        'password',
        'fullname',
        'avatar',
        'phone_number',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function getStatusVnAttribute()
    {
        if ($this->status == USER_STATUS_ACTIVE) {
            return 'Đang kích hoạt';
        } elseif ($this->status == USER_STATUS_DISABLE) {
            return 'Không kích hoạt';
        }

        return 'Đợi xác thực';
    }

    public function group()
    {
        return $this->hasOne('App\Models\Group', 'id', 'group_id');
    }

    public function host()
    {
        return $this->hasOne('App\Models\Host', 'user_id', 'id');
    }

    public function guest()
    {
        return $this->hasOne('App\Models\Guest', 'user_id', 'id');
    }
}
