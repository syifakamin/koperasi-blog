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

//  Route::get('/', function () {
//      return view('ecommerce.index');
//  });

Route::get('/product/{slug}', 'home\FrontController@show')->name('front.show_product');
Route::get('/', 'home\FrontController@index')->name('front.index');
Route::get('/product', 'Ecommerce\FrontController@product')->name('front.product');
Route::get('/category/{slug}', 'home\FrontController@categoryProduct')->name('front.category');
Route::post('cart', 'Ecommerce\CartController@addToCart')->name('front.cart');
Route::get('/cart', 'Ecommerce\CartController@listCart')->name('front.list_cart');
Route::get('/contact', 'Ecommerce\Contact@index')->name('front.contact');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


 Auth::routes();
 Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('home', 'HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    //INI ADALAH ROUTE BARU
    Route::resource('category', 'CategoryController')->except(['create', 'show']);
    Route::resource('/product', 'ProductController')->except(['show']);
    Route::get('product/bulk', 'ProductController@massUploadForm')->name('product.saveBulk');
    
 });