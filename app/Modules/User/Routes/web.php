<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'User'], function () {
    Route::get('/', function () {
        dd('This is the User module index page. Build something great!');
    });
});

Route::get('/login', 'UsersController@showLoginForm');
Route::post('/login', 'UsersController@login')->name('login');
Route::get('/register', 'UsersController@showRegisterForm');
Route::post('/register', 'UsersController@register')->name('register');
Route::get('/password-request', 'UsersController@passwordRequest')->name('password.request');
Route::get('/forgot', 'UsersController@showForgotPasswordForm')->name('forgot.form');
Route::post('/forgot','UsersController@forgotPassword')->name('password.forgot');
Route::get('/password/reset/{token}','UsersController@showFormResetPassword')->name('password.formreset');
Route::post('/password/reset/{token}','UsersController@resetPassword')->name('password.reset');

Route::get('/', 'HomesController@index')->name('homes.index');
Route::get('/search', 'HomesController@search')->name('homes.search');
Route::get('/foods/detail/{food}', 'FoodsController@detail')->name('foods.detail');
Route::get('/meals/{meal_id}/detail', 'MealsController@detail')->name('meals.detail')->where(['meal_id' => '[0-9]']);
Route::get('/hosts/{host}', 'HostsController@detail')->name('hosts.detail');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', 'UsersController@logout')->name('logout');
    Route::get('/mypage', 'UsersController@showMyPage')->name('mypage');

    Route::group(['middleware' => 'host'], function () {
        // Route::resource('foods', 'FoodsController');
        Route::get('/foods', 'FoodsController@index')->name('foods.index');
        Route::get('/foods/create/{lang}', 'FoodsController@create')->name('foods.create');
        Route::post('/foods/{lang}', 'FoodsController@store')->name('foods.store');
        Route::get('/foods/{food}/edit/{foodDetailId}/{lang}', 'FoodsController@edit')->name('foods.edit');
        Route::post('/foods/{food}/update/{foodDetailId}/{lang}', 'FoodsController@update')->name('foods.update');
        Route::delete('/foods/{food}', 'FoodsController@destroy')->name('foods.destroy');

        Route::resource('meals', 'MealsController');
    });
});
