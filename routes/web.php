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
    return view('admin.home');
});
Route::get('category/trash', 'CategoryController@trash')->name('category.trash');
Route::get('category/recover/{id}', 'CategoryController@recoverCat')->name('category.recover');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');