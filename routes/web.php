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
    return view('customer.home');
});

/// product 
Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
	Route::get('show/home', 'ProductController@show_home')->name('home');
	Route::get('about', 'ProductController@about_products')->name('about');
	Route::get('contact', 'ProductController@contact_products')->name('contact');
	Route::get('shop', 'ProductController@shop_products')->name('shop');
	
	Route::get('/', 'ProductController@show')->name('all');

	Route::get('/{product}', 'ProductController@single')->name('single');
	Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('addToCart');
});



/// Admin 
Route::group(['as' => 'admin.', 'middleware' => ['auth', 'admin']],  function () {
	Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
	Route::get('profile/states/{id?}', 'ProfileController@getStates')->name('profile.states');
	Route::get('profile/cities/{id?}', 'ProfileController@getCities')->name('profile.cities');
	Route::resource('category', 'CategoryController');
		Route::resource('profile', 'ProfileController');

});



// Route::get('category/trash', 'CategoryController@trash')->name('category.trash');
// Route::get('category/recover/{id}', 'CategoryController@recoverCat')->name('category.recover');

Route::resource('product', 'ProductController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/producting', [App\Http\Controllers\HomeController::class, 'all']);