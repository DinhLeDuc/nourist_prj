<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\FoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class FoodTypesController extends ApiController
{
    public function store(Request $request)
    {
        try {
            $check = FoodType::where('name', $request->name)->first();
            if (!empty($check)) {
                return $this->response(401, __('tên loại món ăn này đã tồn tại.'));
            }
            $food_type = FoodType::create(['name' => $request->name]);

            return $this->response(201, __('successful!'), $food_type);
        } catch (Exception $e) {
            return $this->response(500, __('Internal Server Error!'), $food_type);
        }
    }
}
