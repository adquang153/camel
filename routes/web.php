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
Route::group(['prefix' => '/admin','middleware'=>['auth','is_admin']], function () {
    Route::get('/', 'MyController@getConfig')->name('admin');
    Route::resource('/products', 'ProductsController',['names' => 'admin.products']);
    Route::resource('/product_type', 'ProductTypeController',['names' => 'admin.product_type']);
    Route::resource('/banner', 'BannerController',['names' => 'admin.banner']);
    Route::resource('/feedback', 'FeedbackController',['names' => 'admin.feedback']);
    Route::resource('/images', 'ImagesController',['names' => 'admin.images']);
    Route::resource('/posts', 'PostsController',['names' => 'admin.posts']);
    Route::resource('/post_type', 'PostTypeController',['names' => 'admin.post_type']);
    Route::resource('/user', 'UserController',['names' => 'admin.user']);
});

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');