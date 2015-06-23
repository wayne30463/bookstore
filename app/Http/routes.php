<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome', ['tag' => '.']);
});

Route::resource('order', 'OrderController');
/*
Route::get('order', 'OrderController@showOrder');
Route::get('/order', function () {
    return view('order');
});*/

Route::resource('rent', 'RentController');
Route::resource('book', 'BookController');

Route::get('/3', function () {
    return view('3');
});