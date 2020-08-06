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
/*
Route::get('/', function () {
    return view('welcome');
});
*/



//管理者ログイン前
Route::group(['prefix' => 'seller'],function(){
   Route::get('login','Seller\LoginController@showLoginForm')->name('seller.login');
   Route::post('login','Seller\LoginController@authenticate')->name('seller.authenticate');
});
//管理者ログイン後
Route::group(['prefix' => 'seller','middleware' => 'auth:seller'],function(){
    // 商品登録、編集、削除
    Route::resource('items', 'ItemsController');
    Route::post('logout','Seller\LoginController@logout')->name('seller.logout');
 });
 
// 商品をトップページに表示
Route::get('/', 'ItemlistsController@top')->name('top');
// 商品詳細ページ
Route::get('detail/{id}', 'ItemlistsController@detail')->name('itemlists.detail');

// カート追加
Route::post('cart/{id}', 'CartsController@store')->name('cart.store');
Route::get('cart', 'CartsController@index')->name('cart.index');
Route::delete('cart/{id}', 'CartsController@destroy')->name('cart.destroy');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ユーザログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

/*
Route::group(['middleware' => ['auth']], function () {
    Route::get('order/create', 'OrdersController@create')->name('order.create');
    // Route::get('order/complete', 'OrderItemController@store')->name('order.store');
    Route::get('order/complete', 'OrderItemController@store')->name('order.store');
});
*/

Route::group(['prefix' => 'order', 'middleware' => ['auth']],function(){
    // 商品登録、編集、削除
    Route::get('create', 'OrdersController@create')->name('order.create');
    Route::get('complete', 'OrderItemController@store')->name('order.store');
 });
