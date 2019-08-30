<?php

namespace App\Modules\User\Http\Controllers;

use App\Models\Food;
use App\Models\Meal;
use App\Models\FoodType;
use App\Models\FoodImage;
use Illuminate\Http\Request;
use App\Validators\MealValidator;
use Illuminate\Support\Facades\File;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class MealsController extends AppController
{
    /**
     * @var MealValidator
     */
    protected $mealValidator;

    public function __construct(MealValidator $mealValidator)
    {
        $this->mealValidator = $mealValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchInput = $request->all();

        $query = Meal::where('user_id', Auth()->user()->id)->orderBy('id', 'desc');
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

        $meals = $query->paginate(PAGE_NUMBER);
        // $foodTypes = FoodType::pluck('name', 'id');

        return view('User::meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::get();

        return view('User::meals.create', compact('foods'));
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
        try {
            $this->MealValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);
        } catch (ValidatorException $e) {
            return redirect(route('foods.create'))->withErrors($e->getMessageBag())->withInput();
        }

        $formData = $request->all();
        $formData['user_id'] = Auth()->user()->id;
        $formData['name_en'] = $this->vn_to_str($formData['name']);
        $food = Food::create($formData);

        if ($request->hasFile('images')) {
            $foodImgFolder = public_path('images/foods');
            if (!File::exists($foodImgFolder)) {
                $org_img = File::makeDirectory($foodImgFolder, 0777, true);
            }

            $files = $request->images;
            $footImages = [];
            foreach ($files as $key => $file) {
                $fileName = $food->id.'-'.time().'-'.++$key.'.'.$file->getClientOriginalExtension();
                $file->move($foodImgFolder, $fileName);

                array_push($footImages, [
                    'food_id' => $food->id,
                    'path' => '/images/foods/'.$fileName,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            FoodImage::insert($footImages);

            return redirect()->route('foods.index')->with('success', 'Thêm món ăn thành công.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $meal_id)
    {
        dd($meal_id);
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
        $foodTypes = FoodType::pluck('name', 'id');

        return view('User::foods.edit', compact('foodTypes', 'food'));
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

    /**
     * Display the specified resource.
     *
     * @param \App\Food $food
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $meal_id)
    {
        $meal = Meal::where('id', $meal_id)->first();
        return view('User::meals.detail', compact('meal'));
    }
}
