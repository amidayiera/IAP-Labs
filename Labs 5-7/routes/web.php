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

Route::get('/', function () {
    return view('cars.allcars');
});

// Route::resource('car', 'CarController');
// Route::resource('review', 'ReviewController');

Route::get('/cars/{id}', 'CarController@show')->name('cars.show');
Route::get('/car/new', 'CarController@newcarform');
Route::get('/cars', 'CarController@allcars');

Route::post('/car', 'CarController@newcar');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('reviews/create/{carId}', 'ReviewController@create')->name('reviews.create');
Route::get('reviews/show/{id}', 'ReviewController@show')->name('reviews.show');
Route::get('reviews/cars/{id}', 'ReviewController@cars')->name('reviews.cars');
Route::get('reviews', 'ReviewController@index')->name('reviews.index');

Route::post('reviews', 'ReviewController@store');