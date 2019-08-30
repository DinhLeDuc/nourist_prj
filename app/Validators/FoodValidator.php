<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class FoodValidator.
 */
class FoodValidator extends LaravelValidator
{
    /**
     * FoodValidator constructor.
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
            BaseValidatorInterface::RULE_CREATE => [
                'food_type' => 'required',
                'name' => 'required|max:150',
                // 'price' => 'required|numeric',
                'number' => 'required',
                'avatar' => 'required',
                'content' => 'required',
            ],
            BaseValidatorInterface::RULE_UPDATE => [
                'food_type' => 'required',
                'name' => 'required|max:150',
                // 'price' => 'required|numeric',
                'number' => 'required',
                'avatar' => 'required',
            ],
        ];

        /*
         *
         * Validator attributes
         *
         */
        $this->attributes = [
            'food_type[]' => __('loại món ăn'),
            'name' => __('tên món ăn'),
            'price' => __('giá'),
            'number' => __('số lượng'),
            'avatar' => __('ảnh đại diện'),
            'status' => __('trạng thái'),
            'content' => 'nội dung',
        ];

        /*
         *
         * Validator messages
         *
         */
        $this->messages = [
            'food_type.required' => __('vui lòng chọn :attribute'),
            'avatar.required' => __('vui lòng chọn :attribute'),
            'required' => __('vui lòng nhập :attribute'),
            'numeric' => __('bạn phải nhập số'),
        ];
    }
}
