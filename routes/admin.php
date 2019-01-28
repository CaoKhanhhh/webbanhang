<?php

Route::get('/', "DashboardController@index")->name('dashboard');


Route::group(['prefix' => 'product'], function () {
    Route::get('/', "ProductController@index")->name('ad-product.list');    

    Route::get('/remove/{id}', "ProductController@remove")->name('ad-product.remove');    

    Route::get('/add', "ProductController@add")->name('ad-product.add');    
    Route::post('/add', "ProductController@postAdd");
    
    Route::get('/edit/{id}', "ProductController@edit")->name('ad-product.edit');    
    Route::post('/save-update', "ProductController@postEdit")->name('ad-product.save-edit');

    Route::post('/upload-product-gallery', "ProductController@uploadGallery")->name('ad-product.upload-gallery');
    Route::post('/remove-product-gallery', "ProductController@removeGallery")->name('ad-product.remove-gallery');

});





?>