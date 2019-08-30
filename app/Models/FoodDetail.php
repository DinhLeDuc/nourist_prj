<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    protected $table = 'food_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'food_id',
        'name',
        'slug',
        'language',
        'price',
        'note',
        'recipe',
        'introduction',
    ];

    /**
     * The attributes get list images of food.
     *
     * @return array
     */
    public function food()
    {
        return $this->hasOne('App\Models\Food', 'id', 'food_id');
    }
}
