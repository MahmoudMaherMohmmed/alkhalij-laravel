<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search');

Route::get('/products', 'HomeController@products')->name('products');

Route::get('/cartridge/{cartridge_slug}', 'HomeController@productDetails')->name('product_details');
Route::get('/printer/{printer_slug}', 'HomeController@printerDetails')->name('printer_details');

Route::get('/cart', function () {
    return view('front.cart');
});

Route::get('/checkout', function () {
    return view('front.checkout');
});

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/404', function () {
    return view('front.404');
});

// Authentication Routes...
Route::get('customer-login', 'Auth\LoginController@showLoginForm')->name('customer.login');
Route::post('customer-login', 'Auth\LoginController@login');
Route::post('customer-logout', 'Auth\LoginController@logout')->name('customer.logout');
