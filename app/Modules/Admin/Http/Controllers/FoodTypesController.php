<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodType;

class FoodTypesController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodTypes = FoodType::paginate(PAGE_NUMBER);

        return view('Admin::food_types.index', compact('foodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::food_types.create');
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
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => __('vui lòng nhập Tên loại.'),
        ]);

        //Check if user was created
        if (FoodType::create(['name' => $request->name])) {
            return redirect()->route('admin.food-type.index')->with('success', __('thêm thành công.'));
        } else {
            return redirect(route('admin.food-type.create'))->with('error', __('Không thể lưu được vui lòng kiểm tra lại thông tin nhập vào.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FoodType $foodType
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FoodType $foodType)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FoodType $foodType
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodType $foodType)
    {
        return view('Admin::food_types.edit', compact('foodType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodType     $foodType
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodType $foodType)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => __('vui lòng nhập Tên loại.'),
        ]);

        $foodType->update($request->all());

        return redirect()->route('admin.food-type.index')->with('success', __('cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FoodType $foodType
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodType $foodType)
    {
        $foodType->delete();

        return redirect()->route('admin.food-type.index')->with('success', __('xóa thành công.'));
    }
}
