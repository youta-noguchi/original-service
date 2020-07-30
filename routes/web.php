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

// 商品登録、編集、削除
Route::resource('items', 'ItemsController');


//ログイン前
Route::group(['prefix' => 'seller'],function(){
   Route::get('login','Seller\LoginController@showLoginForm')->name('seller.login');
   Route::post('login','Seller\LoginController@authenticate')->name('seller.authenticate');
});

//ログイン後
Route::group(['prefix' => 'seller','middleware' => 'auth:seller'],function(){
   Route::post('logout','Seller\LoginController@logout')->name('seller.logout');
 });
 