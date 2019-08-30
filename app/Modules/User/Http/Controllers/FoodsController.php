<?php

namespace App\Modules\User\Http\Controllers;

use App\Models\Food;
use App\Models\FoodType;
use App\Models\FoodDetail;
use App\Models\FoodFoodType;
use Illuminate\Http\Request;
use App\Validators\FoodValidator;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class FoodsController extends AppController
{
    /**
     * @var FoodValidator
     */
    protected $foodValidator;

    public function __construct(FoodValidator $foodValidator)
    {
        $this->foodValidator = $foodValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchInput = $request->all();

        $query = Food::where('user_id', Auth()->user()->id)->orderBy('id', 'desc');
        if ($request->has('keyword')) {
            $query->where(function ($q) use ($searchInput) {
                $q->where('name', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('price', 'like', '%'.$searchInput['keyword'].'%');
            });
        }
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', '=', $request->status);
        }
        if ($request->has('food_type_id') && $request->food_type_id != 'all') {
            $query->where('food_type_id', '=', $request->food_type_id);
        }

        $foods = $query->paginate(PAGE_NUMBER);
        $foodTypes = FoodType::pluck('name', 'id');

        return view('User::foods.index', compact('foods', 'searchInput', 'foodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($langCurrent)
    {
        $foodTypes = FoodType::orderby('name', 'asc')->pluck('name', 'id');

        return view('User::foods.create', compact('foodTypes', 'langCurrent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store($langCurrent, Request $request)
    {
        try {
            $this->foodValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);
        } catch (ValidatorException $e) {
            return redirect(route('foods.create', $langCurrent))->withErrors($e->getMessageBag())->withInput();
        }

        $formData = $request->all();
        $formData['user_id'] = Auth()->user()->id;
        $food = Food::create($formData);

        // insert food detail
        $formData['food_id'] = $food->id;
        $formData['introduction'] = $formData['content'];
        FoodDetail::create($formData);

        // insert food type
        $foodType = [];
        foreach ($formData['food_type'] as $key => $value) {
            array_push($foodType, [
                'food_id' => $food->id,
                'food_type_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        FoodFoodType::insert($foodType);

        return redirect()->route('foods.index')->with('success', __('thêm thành công'));
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
    public function edit(Food $food, $food_detail_id, $langCurrent, Request $request)
    {
        $foodDetailList = FoodDetail::where('food_id', $food->id)->pluck('id', 'language');
        $foodDetail = FoodDetail::where('food_id', $food->id)->where('language', $langCurrent)->first();
        if (empty($foodDetail)) {
            $foodDetail = new FoodDetail();
        }

        $foodTypes = FoodType::orderby('name', 'asc')->pluck('name', 'id');
        $foodFoodTypes = FoodFoodType::where('food_id', $food->id)->pluck('food_type_id', 'id');

        return view('User::foods.edit', compact('langCurrent', 'foodTypes', 'foodFoodTypes', 'food', 'foodDetail', 'foodDetailList', 'food_detail_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Food                $food
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Food $food, $food_detail_id, $langCurrent, Request $request)
    {
        try {
            $this->foodValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);
        } catch (ValidatorException $e) {
            return redirect(route('foods.edit', [$food->id, $food_detail_id, $langCurrent]))->withErrors($e->getMessageBag())->withInput();
        }

        $formData = $request->all();
        $food->update($formData);

        if ($food_detail_id == 0) {
            // insert food detail
            $formData['food_id'] = $food->id;
            $formData['introduction'] = $formData['content'];
            FoodDetail::create($formData);
        } else {
            $food_detail = FoodDetail::find($food_detail_id);
            $food_detail->update($formData);
        }

        FoodFoodType::where('food_id', '=', $food->id)->delete();
        $foodType = [];
        foreach ($formData['food_type'] as $key => $value) {
            array_push($foodType, [
                'food_id' => $food->id,
                'food_type_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        FoodFoodType::insert($foodType);

        return redirect()->route('foods.index')->with('success', __('cập nhật thành công'));
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

    /**
     * Display the specified resource.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Food $food)
    {
        return view('User::foods.detail', compact('food'));
    }
}
