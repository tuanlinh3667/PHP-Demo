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
Route::post('/admin/bakery/destroy', 'BakeryController@destroy');
