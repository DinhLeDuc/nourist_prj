<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleSample;
use Illuminate\Support\Facades\File;
use App\Validators\ArticleSampleValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ArticleSamplesController extends AppController
{
    /**
     * @var ArticleSampleValidator
     */
    protected $validator;

    public function __construct(ArticleSampleValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articleSamples = ArticleSample::paginate(PAGE_NUMBER);

        return view('Admin::article_samples.index', compact('articleSamples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::article_samples.create');
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
            $this->validator->with($request->all())->passesOrFail();
        } catch (ValidatorException $e) {
            return redirect(route('admin.article_samples.create'))->withErrors($e->getMessageBag())->withInput();
        }

        $dataForm = $request->all();
        $foodUserFolder = public_path('images/article_samples');
        if (!File::exists($foodUserFolder)) {
            $org_img = File::makeDirectory($foodUserFolder, 0777, true);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($foodUserFolder, $fileName);
            $dataForm['avatar'] = '/images/article_samples/'.$fileName;
        }

        if (ArticleSample::create($dataForm)) {
            return redirect(route('admin.article_samples.index'))->with('success', __('thêm mới thành công.'));
        } else {
            return redirect(route('admin.article_samples.create'))->with('error', __('lưu không thành công.'));
        }
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
