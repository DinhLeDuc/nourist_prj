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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', 'AdminsController@login');
    Route::post('login', 'AdminsController@signIn')->name('login');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('logout', 'AdminsController@logout')->name('logout');
        Route::get('/', 'AdminsController@dashboard')->name('dashboard');

        Route::resource('food-type', 'FoodTypesController');
        Route::resource('users', 'UsersController');
        Route::resource('foods', 'FoodsController');
        Route::resource('article_samples', 'ArticleSamplesController');
    });
});
