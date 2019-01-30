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

Route::get('/','HomeController@index')->name('home');
Route::get('danh-muc/{id}','HomeController@listProduct')->name('product.list');
Route::get('chi-tiet-san-pham/{id}','HomeController@productDetail')->name('product.detail');
Route::get('kiem-tra-don-hang','HomeController@getcheckout')->name('product.checkout');
Route::post('luu','HomeController@postcheckout')->name('product.postcheckout');
Route::get('login','HomeController@login')->name('login');
Route::get('logout','HomeController@logout')->name('logout');
Route::post('login','HomeController@postLogin');
Route::post('login','HomeController@createUsers')->name('user.create');




