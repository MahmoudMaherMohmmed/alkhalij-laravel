<?php

Route::get('/home', 'HomeController@index')->name('admin.index');

//Website Settings
Route::resource('website-settings', 'WebsiteSettingController');

//User Settings
Route::resource('staff', 'StaffController');
Route::resource('customers', 'CustomerController');

//Printer
Route::resource('printers', 'PrinterController');
Route::resource('cartridges', 'CartridgeController');

//Cartridge Settings
Route::resource('categories', 'CategoryController');
Route::resource('types', 'TypeController');
Route::resource('manufactures', 'ManufactureController');
Route::resource('features', 'FeatureController');
Route::resource('colors', 'ColorController');

//Home Settings
Route::resource('sliders', 'SliderController');
Route::resource('services', 'ServiceController');
Route::resource('teams', 'TeamController');

//general Settings
Route::resource('sociallinks', 'SocialLinkController');
Route::resource('currencies', 'CurrencyController');
Route::resource('countries', 'CountryController');
Route::resource('states', 'StateController');
Route::post('/get-states', 'StateController@getStates')->name('get-states');

