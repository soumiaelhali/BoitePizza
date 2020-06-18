<?php

use Illuminate\Support\Facades\Route;


Route::get('/','website\IndexController@listProduit');
Route::get('/add-to-cart/{id}' ,'website\CartController@addToCart');
Route::get('/go-to-cart','website\CartController@showcart')->name('go-to-cart');
Route::patch('update-cart', 'website\CartController@update');
Route::delete('remove-from-cart', 'website\CartController@remove');
Route::get('/detail-product', 'website\DetailProductController@index');
