<?php

namespace App\Http\Controllers;

use App\Models\ArticleSample;

class ArticleSamplesController extends Controller
{
    public function index()
    {
        $article_samples = ArticleSample::paginate(PAGE_NUMBER);

        return response()->view('article_samples.index', compact('article_samples'));
    }

    public function get($id)
    {
        $article_sample = ArticleSample::find($id);

        if (empty($article_sample)) {
            return response()->json([
                'code' => 404,
                'message' => __('Not found'),
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => __('successfull!'),
                'data' => $article_sample,
            ]);
        }
    }
}
