<?php

namespace App\Modules\User\Http\Controllers;

use App\Models\Food;
use App\Models\Meal;
use Illuminate\Http\Request;

class HomesController extends AppController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('User::homes.index');
    }

    public function search(Request $request)
    {
        $searchParam = $request->all();

        $query = Meal::select('hosts.*', 'meals.*')
            ->join('hosts', 'hosts.user_id', '=', 'meals.user_id')
            ->orderBy('meals.id', 'desc');

        if ($request->has('food_name')) {
            $query->where(function ($q) use ($searchParam) {
                $q->where('meals.name', 'like', '%'.$searchParam['food_name'].'%')
                ->orWhere('meals.name_en', 'like', '%'.$searchParam['food_name'].'%');
            });
        }

        if ($request->has('position')) {
            $query->where('hosts.city', 'like', '%'.$searchParam['position'].'%');
        } else {
            $searchParam['position'] = null;
        }

        $time_eat = date('m/d/Y', time());
        if (!empty($searchParam['time_eat'])) {
            $time_eat = $searchParam['time_eat'];
        }

        $position = $searchParam['position'];

        $foods = $query->paginate(PAGE_NUMBER);

        return view('User::homes.search', compact('foods', 'searchParam', 'position', 'time_eat'));
    }
}
