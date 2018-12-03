<?php

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
    return view('welcome');
});
// Route::get('/','PurchaseController@store_purchase');
Route::post('/store_purchase','PurchaseController@store_purchase');
Route::post('/store_Order','OrderController@store_Order');
Route::resource('purchase', 'PurchaseController');

Route::resource('orders', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
