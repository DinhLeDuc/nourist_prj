<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/medias', 'MediasController@index')->name('medias.index');
Route::post('/medias/upload', 'MediasController@upload')->name('medias.upload');

Route::get('/article_samples', 'ArticleSamplesController@index')->name('article_samples.index');
Route::get('/article_samples/{id}', 'ArticleSamplesController@get')->name('article_samples.get');
