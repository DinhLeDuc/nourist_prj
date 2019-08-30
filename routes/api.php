<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {
    Route::get('/get-district', 'DistrictsController@getDistrict')->name('get-district');
    Route::get('/city/autocomplete', 'CitiesController@autocomplete')->name('city.autocomplete');

    Route::get('/foods', 'FoodsController@index')->name('foods.index');
    Route::post('/foods/upload-image', 'FoodsController@uploadImage')->name('food.uploadImage');
    Route::get('/foods/get-slug', 'FoodsController@getSlug')->name('foods.getSlug');

    Route::post('/food-type/store', 'FoodTypesController@store')->name('foodTypes.store');

    Route::get('/meals/get-slug', 'MealsController@getSlug')->name('meals.getSlug');
});
