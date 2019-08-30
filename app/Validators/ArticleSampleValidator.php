<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class ArticleSampleValidator.
 */
class ArticleSampleValidator extends LaravelValidator
{
    /**
     * ArticleSampleValidator constructor.
     *
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        parent::__construct($validator);

        /*
         *
         * Validator rules
         *
         */
        $this->rules = [
            'title' => 'required',
            'avatar' => 'required',
            'content' => 'required',
        ];

        /*
         *
         * Validator attributes
         *
         */
        $this->attributes = [
            'title' => __('tiêu đề bài viết'),
            'avatar' => __('ảnh đại diện'),
            'content' => __('nội dung'),
        ];

        /*
         *
         * Validator messages
         *
         */
        $this->messages = [
            'required' => __('Vui lòng nhập :attribute.'),
        ];
    }
}
