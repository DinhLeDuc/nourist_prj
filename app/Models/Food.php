<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'avatar',
        'number',
        'status',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_foods', 'food_id', 'id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\FoodDetail', 'food_id', 'id');
    }

    public function detail_lang()
    {
        $langCurent = app()->getLocale();
        $foodDetail = FoodDetail::where('food_id', $this->id)->where('language', $langCurent)->first();
        if (empty($foodDetail)) {
            $foodDetail = FoodDetail::where('food_id', $this->id)->first();
        }

        return $foodDetail;
    }

    public function foodFoodTypes()
    {
        return $this->hasMany('App\Models\FoodFoodType', 'food_id', 'id');
    }
}
