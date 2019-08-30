<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;

interface BaseValidatorInterface extends ValidatorInterface
{
    const RULE_USER_LOGIN = 'user_login';
    const RULE_ADMIN_LOGIN = 'admin_login';
}
