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


Route::resource('/checkout', 'OrderController');


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
		Route::resource('contact', 'ContactController');
		Route::resource('product', 'ProductController');
		Route::resource('order', 'AdminOrder');
});




///// user login and register
Route::group(['as' => 'uers.', 'prefix' => 'users'], function () {
	Route::get('login', 'AuthController@loginUser')->name('login');
	Route::get('register', 'AuthController@loginRegister')->name('register');
	Route::POST('contact', 'UseContactController@store')->name('contact');
});





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/producting', [App\Http\Controllers\HomeController::class, 'all']);


//  shopping cart

Route::get('cart', 'CartController@cartList')->name('cart.list');
Route::post('cart', 'CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'CartController@updateCart')->name('cart.update');
Route::post('remove', 'CartController@removeCart')->name('cart.remove');
Route::post('clear', 'CartController@clearAllCart')->name('cart.clear');
Route::get('carted', 'CartController@cartListed')->name('cart.listed');
