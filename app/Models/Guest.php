<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'countryside',
    ];

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
