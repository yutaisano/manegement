<?php

use App\Http\Controllers\ProductController;
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


//商品一覧表示
Route::get('/','ProductController@showList')->name('product');

//商品詳細表示
Route::get('/detail/{id}', 'ProductController@detail')->name('detail');

//編集画面表示
Route::get('/edit/{id}', 'ProductController@showEdit')->name('edit');
Route::post('/update','ProductController@exeUpdate')->name('update');

//検索機能
Route::get('/search','ProductController@search')->name('search');

//商品登録画面
Route::get('/create','ProductController@showCreate')->name('create');

//商品登録
Route::post('/store','ProductController@exeStore')->name('store');

//商品情報削除
Route::post('/delete','ProductController@exeDelete')->name('delete');

//購入機能
//Route::get('/sales','ProductController@salesAdd')->name('sales');


//ログイン機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
