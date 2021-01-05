<?php

use Illuminate\Http\Request;

Route::get('products', 'ProductController@index')->name('product');
Route::post('products', 'ProductController@store')->name('product.store');
Route::post('orders', 'CartController@store')->name('cart.store');
