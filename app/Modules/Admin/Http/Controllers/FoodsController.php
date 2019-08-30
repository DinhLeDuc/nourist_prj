<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchInput = $request->all();

        $query = Food::orderBy('id', 'desc');
        if ($request->has('keyword')) {
            $query->where(function ($q) use ($searchInput) {
                $q->where('fullname', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('username', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('email', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('phone_number', 'like', '%'.$searchInput['keyword'].'%');
            });
        }
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', '=', $request->status);
        }
        if ($request->has('group_id') && $request->group_id != 'all') {
            $query->where('group_id', '=', $request->group_id);
        }

        $foods = $query->paginate(PAGE_NUMBER);

        return view('Admin::foods.index', compact('foods', 'searchInput'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Food                $food
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
    }
}
