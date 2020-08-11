<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminsController@index')->name('admin.index');

Route::post('/admin/store', 'AdminsController@store')->name('admin.store');
Route::get('/admin/create', 'AdminsController@create')->name('admin.create');

Route::get('/admin/read', 'AdminsController@read')->name('admin.read');
Route::delete('/admin/read/{user}/destroy', 'AdminsController@destroy')->name('admin.destroy');

