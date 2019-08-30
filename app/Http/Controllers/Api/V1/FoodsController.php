<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Food;
use App\Models\Meal;
use Illuminate\Http\Request;

class FoodsController extends ApiController
{
    public function index(Request $request)
    {
        $searchParam = $request->query();

        $query = Meal::select('meals.*', 'hosts.*')
            ->join('hosts', 'hosts.user_id', '=', 'meals.user_id');

        if ($request->has('food_name')) {
            $query->where(function ($q) use ($searchParam) {
                $q->where('meals.name', 'like', '%'.$searchParam['food_name'].'%')
                    ->orWhere('meals.name_en', 'like', '%'.$searchParam['food_name'].'%');
            });
        }

        if ($request->has('position')) {
            $query->where('hosts.city', 'like', '%'.$searchParam['position'].'%');
        }

        if (!empty($searchParam['sort_type'])) {
            switch ($searchParam['sort_type']) {
                case FOOT_SORT_TYPE_MAX_PRICE:
                   $query->orderBy('meals.price', 'desc');
                   break;
               case FOOT_SORT_TYPE_MIN_PRICE:
                   $query->orderBy('meals.price', 'asc');
                   break;
                case FOOT_SORT_TYPE_MAX_PRICE:

                    break;
                case FOOT_SORT_TYPE_MIN_PRICE:
                    break;
            }
        }

        if (!empty($searchParam['type_meals'])) {
            $query->whereIn('meals.type_meal', $searchParam['type_meals']);
        }

        if (!empty($searchParam['prices'])) {
            $prices = explode(',', $searchParam['prices']);
            $query->whereBetween('meals.price', $prices);
        }

        $foods = $query->paginate(PAGE_NUMBER);
        sleep(1);

        return response()->view('User::homes.partials.resultsearch', compact('foods'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->stringToSlug($request->title);

        $food = Food::where('slug', $slug);
        while (empty($food)) {
            $slug = $slug.'-'.$i;
            $food = Food::where('slug', $slug);
            ++$i;
        }

        return response()->json([
            'code' => 200,
            'message' => __('successful!'),
            'slug' => $slug,
        ]);
    }
}
