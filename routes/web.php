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



Route::name('product.')
      ->group(function () {
          Route::get('/', 'ProductController@index')->name('index');
          Route::get('/product/{id}', 'ProductController@show')->name('show');
      });
      
      
Route::group(['prefix' => 'product/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
});

Route::get('favorites', 'UsersController@favorites')->name('users.favorites');    

Route::post('/cart', 'CartController@store');
Route::get('/cartitem', 'CartController@index');
Route::delete('/cartitem/{cart}', 'CartController@destroy');
Route::get('/cartitem/checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/cartitem/success', 'CartController@success')->name('cart.success');
Route::get('/order', 'OrdersController@index')->name('orders.index');
Route::delete('/order/{order}', 'OrdersController@destroy');

Route::get('/order_detail/show/{detail}', 'OrderDetailController@show')->name('order_detail.show');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => 'show']);
});
