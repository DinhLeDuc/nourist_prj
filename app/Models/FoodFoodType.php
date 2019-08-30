<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodFoodType extends Model
{
    protected $table = 'food_food_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'food_id',
        'food_type_id',
    ];
}
