<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_code',
        'code',
        'name',
        'slug',
        'type',
        'path',
    ];

    public function images()
    {
        return $this->hasOne('App\Models\District', 'code', 'parent_code');
    }
}
