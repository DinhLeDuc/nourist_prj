<?php
/**
 * Created by PhpStorm.
 * User: Hoang Anh Tuan
 * Date: 3/14/2019
 * Time: 9:27 AM.
 */
if (!defined('APP_NAME')) {
    define('APP_NAME', 'Nourist');
}
if (!defined('APP_VERSION')) {
    define('APP_VERSION', 'v1.0.0-alpha');
}
if (!defined('APP_COPYRIGHT')) {
    define('APP_COPYRIGHT', '2019');
}
if (!defined('APP_SUPPORT')) {
    define('APP_SUPPORT', 'admin@codelovers.vn');
}
if (!defined('APP_SUPPORT_PHONE')) {
    define('APP_SUPPORT_PHONE', '0123 456 789');
}

if (!defined('ADMIN_DEFAULT_LIMIT')) {
    define('ADMIN_DEFAULT_LIMIT', 15);
}
if (!defined('ADMIN_DEFAULT_LIMITS_DISPLAY')) {
    define('ADMIN_DEFAULT_LIMITS_DISPLAY', serialize(
    [5 => 5, 10 => 10, 15 => 15, 20 => 20, 30 => 30, 50 => 50, 100 => 100, 200 => 200]
));
}

if (!defined('GENDER_FEMALE')) {
    define('GENDER_FEMALE', 0);
}
if (!defined('GENDER_MALE')) {
    define('GENDER_MALE', 1);
}

if (!defined('USER_TYPE_HOST')) {
    define('USER_TYPE_HOST', 'host');
}
if (!defined('USER_TYPE_GUEST')) {
    define('USER_TYPE_GUEST', 'guest');
}

if (!defined('USER_STATUS_INACTIVE')) {
    define('USER_STATUS_INACTIVE', 'inactive');
}
if (!defined('USER_STATUS_ACTIVE')) {
    define('USER_STATUS_ACTIVE', 'active');
}
if (!defined('USER_STATUS_VERIFY')) {
    define('USER_STATUS_VERIFY', 'verify');
}
if (!defined('USER_STATUS_DISABLE')) {
    define('USER_STATUS_DISABLE', 'disable');
}

if (!defined('USER_SOCIAL_TYPE_FACEBOOK')) {
    define('USER_SOCIAL_TYPE_FACEBOOK', 'facebook');
}
if (!defined('USER_SOCIAL_TYPE_GOOGLE')) {
    define('USER_SOCIAL_TYPE_GOOGLE', 'google');
}
if (!defined('USER_SOCIAL_TYPE_TWITTER')) {
    define('USER_SOCIAL_TYPE_TWITTER', 'twitter');
}

if (!defined('PAGE_NUMBER')) {
    define('PAGE_NUMBER', 20);
}

if (!defined('ROLE_MANAGER_ADMIN')) {
    define('ROLE_MANAGER_ADMIN', 'admin');
}
if (!defined('ROLE_MANAGER_MASTER')) {
    define('ROLE_MANAGER_MASTER', 'master');
}

if (!defined('ADMIN_STATUS_ACTIVE')) {
    define('ADMIN_STATUS_ACTIVE', 'active');
}
if (!defined('ADMIN_STATUS_INACTIVE')) {
    define('ADMIN_STATUS_INACTIVE', 'inactive');
}

if (!defined('FOOT_SORT_TYPE_MAX_REVIEW')) {
    define('FOOT_SORT_TYPE_MAX_REVIEW', 'max_review');
}
if (!defined('FOOT_SORT_TYPE_MIN_REVIEW')) {
    define('FOOT_SORT_TYPE_MIN_REVIEW', 'min_review');
}
if (!defined('FOOT_SORT_TYPE_MAX_PRICE')) {
    define('FOOT_SORT_TYPE_MAX_PRICE', 'max_price');
}
if (!defined('FOOT_SORT_TYPE_MIN_PRICE')) {
    define('FOOT_SORT_TYPE_MIN_PRICE', 'min_price');
}

if (!defined('TYPE_MEAL_BREAKFAST')) {
    define('TYPE_MEAL_BREAKFAST', 'breakfast');
}

if (!defined('TYPE_MEAL_LUNCH')) {
    define('TYPE_MEAL_LUNCH', 'lunch');
}

if (!defined('TYPE_MEAL_DINNER')) {
    define('TYPE_MEAL_DINNER', 'dinner');
}

if (!defined('FOOD_MEAL_PUBLIC')) {
    define('FOOD_MEAL_PUBLIC', 'public');
}

if (!defined('FOOD_MEAL_DRAFT')) {
    define('FOOD_MEAL_DRAFT', 'draft');
}

if (!defined('FOOD_MEAL_TRASH')) {
    define('FOOD_MEAL_TRASH', 'trash');
}
