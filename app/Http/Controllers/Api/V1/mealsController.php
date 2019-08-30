<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class MealsController extends ApiController
{
    public function getSlug(Request $request)
    {
        $slug = $this->stringToSlug($request->title);

        $meal = Meal::where('slug', $slug);
        $i = 1;
        while (empty($meal)) {
            $slug = $slug.'-'.$i;
            $meal = Meal::where('slug', $slug);
            ++$i;
        }

        return response()->json([
            'code' => 200,
            'message' => __('successful!.'),
            'slug' => $slug,
        ]);
    }
}
