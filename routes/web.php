<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminsController@index')->name('admin.index');

Route::post('/admin/store', 'AdminsController@store')->name('admin.store');
Route::get('/admin/create', 'AdminsController@create')->name('admin.create');
