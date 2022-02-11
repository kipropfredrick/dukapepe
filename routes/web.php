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

Route::get('/', 'HomeController@categories')->name('homee');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/add/brand','AdminController@brand')->name('add.brand');
Route::post('/add_brand','AdminController@add_brand')->name('brand');
Route::get('/add_cat','AdminController@category')->name('categories');
Route::get('/subcategory','AdminController@subcategory')->name('subcategory');
Route::post('/add_subcategory','AdminController@add_subcategory')->name('add.subcategory');
Route::post('/add_category','AdminController@add_category')->name('category');
Route::get('/products/{id}', 'HomeController@products');
Route::post('add-to-cart', 'HomeController@addToCart')->name('add.to.cart');
Route::get('cart', 'HomeController@cart')->name('cart');
Route::patch('update-cart',  'HomeController@update')->name('update.cart');
Route::delete('remove-from-cart', 'HomeController@remove')->name('remove.from.cart');
Route::get('saveorder', 'HomeController@saveorder')->name('saveorder');
Route::get('/sub/cat/{id}', 'AdminController@subcat')->name('subcat');
Route::get('products', 'AdminController@products')->name('products');
Route::post('produc', 'AdminController@addpro')->name('produc');


