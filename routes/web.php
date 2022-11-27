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

Route::any('/', 'Frontend\IndexController@index')->name('frontend.index');

Auth::routes();

Route::get('/register', function () {
    return redirect('/login');
});

Route::any('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::any('/checklogin', 'Auth\LoginController@login')->name('user.checklogin');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/categories', 'User\CategoryController@index')->name('user.category');
Route::any('/categories/add/{id}', 'User\CategoryController@addEdit')->name('user.category.add');
Route::any('/categories/update/{id}', 'User\CategoryController@update')->name('user.category.update');
Route::any('/categories/delete/{id}', 'User\CategoryController@delete')->name('user.category.delete');

Route::get('/products', 'User\ProductController@index')->name('user.product');
Route::any('/products/add/{id}', 'User\ProductController@addEdit')->name('user.product.add');
Route::any('/products/update/{id}', 'User\ProductController@update')->name('user.product.update');
Route::any('/products/delete/{id}', 'User\ProductController@delete')->name('user.product.delete');
