<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class DistrictsController extends ApiController
{
    public function getDistrict(Request $request)
    {
        $city = City::where('name', $request->city_name)->first();
        $districts = District::where('parent_code', $city->code)->orderBy('name', 'asc')->get();

        return response()->json($districts);
    }
}
