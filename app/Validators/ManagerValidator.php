<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class ManagerValidator.
 *
 * @package namespace App\Validators;
 */
class ManagerValidator extends LaravelValidator
{

    /**
     * ManagerValidator constructor.
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        parent::__construct($validator);

        /**
         *
         * Validator rules
         *
         */
        $this->rules = [
            BaseValidatorInterface::RULE_CREATE => [
                'email'             => 'required|email',
                'password_flg'      => 'required|min:6',
                'password_confirm'  => 'required|min:6|same:password_flg',
            ],
            BaseValidatorInterface::RULE_UPDATE => [

            ],
            BaseValidatorInterface::RULE_MANAGER_LOGIN => [
                'email'     => 'required|email',
                'password'  => 'required',
            ],
        
        ];

        /**
         *
         * Validator attributes
         *
         */
        $this->attributes = [
            'email'             => __('email address'),
            'password_flg'          => __('password'),
            'password_confirm'  => __('confirm password')
        ];

        /**
         *
         * Validator messages
         *
         */
        $this->messages = [

        ];
    }

}
