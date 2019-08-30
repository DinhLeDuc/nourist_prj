<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'name_en',
        'number_people',
        'price',
        'type_meal',
        'introduction',
    ];

    /**
     * The attributes get avatar for food.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        if (!empty($this->images[0])) {
            return $this->images[0]->path;
        } else {
            return '/images/food-default.png';
        }
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * The attributes get list images of food.
     *
     * @return array
     */
    public function images()
    {
        return $this->hasMany('App\Models\FoodImage', 'food_id', 'id');
    }
}
