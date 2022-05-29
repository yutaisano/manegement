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



Route::get('/products', 'productController@index');



//ログイン機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
