<?php 

use Illuminate\Http\Request;
Route::get('/','CartController@index')->name('Cart.index');
Route::get('/them/{id}','CartController@add')->name('Cart.add');
Route::post('/xoa','CartController@remove')->name('Cart.remove');
Route::post('/thay-doi','CartController@change')->name('Cart.change');



// Route::post('checkout,Clients\CartsControllers@save')->name('Cart.save');








 ?>