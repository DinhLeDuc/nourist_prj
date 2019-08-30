<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class UserValidato.
 */
class UserValidator extends LaravelValidator
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
            BaseValidatorInterface::RULE_USER_LOGIN => [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            BaseValidatorInterface::RULE_CREATE => [
                'group_id' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ],
            BaseValidatorInterface::RULE_UPDATE => [
                'group_id' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
            ],
        ];

        /*
         *
         * Validator attributes
         *
         */
        $this->attributes = [
            'group_id' => __('loại tài khoản'),
            'username' => __('tên đăng nhập'),
            'email' => __('email'),
            'password' => __('mật khẩu'),
        ];

        /*
         *
         * Validator messages
         *
         */
        $this->messages = [
            'required' => __('Vui lòng nhập :attribute.'),
            'unique' => __(':attribute đã được sử dụng.'),
            'email' => __('khong phai địa chỉ email.'),
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự.',
        ];
    }
}
