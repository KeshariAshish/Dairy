<?php

use Illuminate\Support\Facades\Route;



Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@index')->name('home');

Route::get('/lang/{locale}', 'HomeController@lang')->name('lang');



Route::get('/admin', 'AdminsController@index')->name('admin.index');
Route::post('/admin/store', 'AdminsController@store')->name('admin.store');
Route::get('/admin/create', 'AdminsController@create')->name('admin.create');
Route::get('/admin/read', 'AdminsController@read')->name('admin.read');
Route::delete('/admin/read/{user}/destroy', 'AdminsController@destroy')->name('admin.destroy');
Route::get('/admin/edit/{id}' , 'AdminsController@edit')->name('admin.edit');
Route::patch('/admin/update/{id}' , 'AdminsController@update')->name('admin.update');
Route::delete('/admin/delete', 'AdminsController@deleteUsers')->name('admin.delete');


Route::get('/admin/product/create', 'ProductsController@create')->name('product.create');
Route::post('/admin/product/store', 'ProductsController@store')->name('product.store');
Route::get('/admin/product/read', 'ProductsController@read')->name('product.read');
Route::delete('/admin/product/read/{product}/destroy', 'ProductsController@destroy')->name('product.destroy');
Route::get('/admin/product/edit/{id}' , 'ProductsController@edit')->name('product.edit');
Route::patch('/admin/product/update/{id}' , 'ProductsController@update')->name('product.update');
Route::delete('/admin/product/delete', 'ProductsController@deleteProduct')->name('product.delete');




Route::get('/admin/production/create', 'ProductionController@create')->name('production.create');
Route::post('/admin/production/store', 'ProductionController@store')->name('production.store');
Route::get('/admin/production/index',  'ProductionController@index')->name('production.read');
Route::delete('/admin/production/index/{production}/destroy', 'ProductionController@destroy')->name('production.destroy');
Route::get('/admin/production/edit/{id}' , 'ProductionController@edit')->name('production.edit');
Route::patch('/admin/production/update/{id}' , 'ProductionController@update')->name('production.update');
// Route::delete('/admin/stock/delete', 'StockController@deleteStock')->name('stock.delete');




// Route::get('/admin/subscriber/create', 'SubscribersController@create')->name('subscriber.create');
// Route::post('/admin/subscriber/store', 'SubscribersController@store')->name('subscriber.store');
// Route::get('/admin/subscriber/read', 'SubscribersController@read')->name('subscriber.read');
// Route::delete('/admin/subscriber/read/{subscriber}/destroy', 'SubscribersController@destroy')->name('subscriber.destroy');
// Route::get('/admin/subscriber/edit/{id}' , 'SubscribersController@edit')->name('subscriber.edit');
// Route::patch('/admin/subscriber/update/{id}' , 'SubscribersController@update')->name('subscriber.update');
// Route::delete('/admin/subscriber/delete', 'SubscribersController@deleteSubscriber')->name('subscriber.delete');



// Route::get('/admin/stock/create', 'StockController@create')->name('stock.create');
// Route::post('/admin/stock/store', 'StockController@store')->name('stock.store');
// Route::get('/admin/stock/read', 'StockController@read')->name('stock.read');
// Route::delete('/admin/stock/read/{stock}/destroy', 'StockController@destroy')->name('stock.destroy');
// Route::get('/admin/stock/edit/{id}' , 'StockController@edit')->name('stock.edit');
// Route::patch('/admin/stock/update/{id}' , 'StockController@update')->name('stock.update');
// Route::delete('/admin/stock/delete', 'StockController@deleteStock')->name('stock.delete');








Route::get('/admin/supply/create', 'SupplyController@create')->name('supply.create');
Route::post('/admin/supply/store', 'SupplyController@store')->name('supply.store');
Route::get('/admin/supply/read', 'SupplyController@read')->name('supply.read');
Route::delete('/admin/supply/read/{supply}/destroy', 'SupplyController@destroy')->name('supply.destroy');
Route::get('/admin/supply/edit/{id}' , 'SupplyController@edit')->name('supply.edit');
Route::patch('/admin/supply/update/{id}' , 'SupplyController@update')->name('supply.update');
Route::delete('/admin/supply/delete', 'SupplyController@deleteSupply')->name('supply.delete');
Route::get('/admin/supply/morning', 'SupplyController@slotMorning')->name('supply.morning');
Route::patch('/admin/supply/morning/update', 'SupplyController@updateMorningSupply')->name('supply.update');
Route::get('/admin/supply/evening', 'SupplyController@slotEvening')->name('supply.evening');
Route::patch('/admin/supply/evening', 'SupplyController@updateEveningSupply')->name('supply.evening');





