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

Route::get('/admin/bakery/list', 'BakeryController@index');
Route::get('/admin/bakery/show', 'BakeryController@show');
Route::get('/admin/bakery/create', 'BakeryController@create');
Route::post('/admin/bakery/store', 'BakeryController@store');
Route::get('/admin/bakery/edit/{id}', 'BakeryController@edit');
Route::post('/admin/bakery/update', 'BakeryController@update');
Route::get('/admin/bakery/delete/{id}', 'BakeryController@delete');
Route::post('/admin/bakery/destroy/{id}', 'BakeryController@destroy');

Route::resource('admin/category', 'CategoryController');
Route::resource('admin/collection', 'CollectionController');
Route::resource('admin/article', 'ArticleController');


