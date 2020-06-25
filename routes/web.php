<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/cities')->group(function (){
    Route::get('/','CityController@index')->name('cities.index');
    Route::get('/create','CityController@create')->name('cities.create');
    Route::post('/create','CityController@store')->name('cities.store');
    Route::get('/{id}/edit','CityController@edit')->name('cities.edit');
    Route::post('/{id}/edit','CityController@update')->name('cities.update');
    Route::get('/{id}/delete','CityController@destroy')->name('cities.destroy');
});
Route::prefix('/customers')->group(function (){
    Route::get('/','CustomerController@index')->name('customer.index');
    Route::get('/create','CustomerController@create')->name('customer.create');
    Route::post('/create','CustomerController@store')->name('customer.store');
    Route::get('/{id}/edit','CustomerController@edit')->name('customer.edit');
    Route::post('/{id}/edit','CustomerController@update')->name('customer.update');
    Route::get('/{id}/delete','CustomerController@destroy')->name('customer.destroy');
    Route::get('/filter','CustomerController@filterByCity')->name('customer.filterByCity');
    Route::get('/search','CustomerController@search')->name('customer.search');
});

