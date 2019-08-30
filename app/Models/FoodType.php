<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = 'food_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
