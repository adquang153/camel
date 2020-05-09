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
    return view('welcome');
});
Route::group(['prefix' => '/admin','middleware'=>'auth'], function () {
    Route::get('/', 'MyController@getConfig')->name('admin');
    Route::resource('/products', 'ProductsController');
    Route::resource('/product_type', 'ProductTypeController');
    Route::resource('/banner', 'BannerController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/images', 'ImagesController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/post_type', 'PostTypeController');
    Route::resource('/user', 'UserController');
});

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
