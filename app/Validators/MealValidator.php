<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class MealValidator.
 */
class MealValidator extends LaravelValidator
{
    /**
     * MealValidator constructor.
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
                'foot_type_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'number' => 'required',
            ],
            BaseValidatorInterface::RULE_UPDATE => [
                'foot_type_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'number' => 'required',
            ],
        ];

        /*
         *
         * Validator attributes
         *
         */
        $this->attributes = [
            'foot_type_id' => __('loại món ăn'),
            'name' => __('tên món ăn'),
            'price' => __('giá'),
            'number' => __('Số lượng'),
            'status' => __('Trạng thái'),
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
