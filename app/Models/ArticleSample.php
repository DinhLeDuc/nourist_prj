<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSample extends Model
{
    protected $table = 'article_samples';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'avatar',
        'content',
        'content_preview',
    ];
}
