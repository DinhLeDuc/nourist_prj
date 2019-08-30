<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class CitiesController extends ApiController
{
    public function autocomplete(Request $request)
    {
        $cities = City::where('name', 'like', '%'.$request->name.'%')->get();

        return response()->json([
            'code' => 200,
            'message' => __('successfull!'),
            'data' => $cities,
        ]);
    }
}
