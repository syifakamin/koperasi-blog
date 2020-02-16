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
Route::get('/checkout/{invoice}', 'Ecommerce\CartController@checkoutFinish')->name('front.finish_checkout'); 
Route::get('/product/{slug}', 'home\FrontController@show')->name('front.show_product');
Route::get('/', 'home\FrontController@index')->name('front.index');
Route::get('/product', 'Ecommerce\FrontController@product')->name('front.product');
Route::get('/category/{slug}', 'home\FrontController@categoryProduct')->name('front.category');
Route::post('cart', 'Ecommerce\CartController@addToCart')->name('front.cart');
Route::get('/cart', 'Ecommerce\CartController@listCart')->name('front.list_cart');
Route::post('/cart/update', 'Ecommerce\CartController@updateCart')->name('front.update_cart');
Route::get('/contact', 'Ecommerce\Contact@index')->name('front.contact');
Route::get('/checkout', 'Ecommerce\CartController@checkout')->name('front.checkout');
Route::get('api/city', 'Ecommerce\CartController@getCity');
Route::get('api/district', 'Ecommerce\cartController@getDistrict');
route::post('/checkout', 'Ecommerce\CartController@prosesCheckout')->name('front.store_checkout');



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


 Auth::routes();
 

//Group Route untuk Administrator
 Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('home', 'HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    //INI ADALAH ROUTE BARU
    Route::resource('category', 'CategoryController')->except(['create', 'show']);
    Route::resource('/product', 'ProductController')->except(['show']);
    Route::get('product/bulk', 'ProductController@massUploadForm')->name('product.saveBulk');
    
 });


//Group Route untuk Member / Customer
 Route::group(['prefix' => 'member', 'namespace' => 'Ecommerce'], function(){
     Route::get('login', 'LoginController@loginForm')->name('customer.login');
     Route::get('verify/{token}', 'FrontController@verifyCustomerRegistration')->name('customer.verify');
     Route::post('login', 'LoginController@login')->name('customer.post_login');
});


//Group Route untuk Middleware
Route::group(['middleware' => 'customer'], function() {
    Route::get('dashboard', 'LoginController@dashboard')->name('customer.dashboard');
    Route::get('logout', 'loginController@logout')->name('customer.logout');
    Route::get('orders', 'OrderController@index')->name('customer.orders');
    Route::get('orders/{invoice}', 'OrderController@view')->name('customer.view_order');
    Route::get('payment', 'OrderController@paymentForm')->name('customer.paymentForm');
    ROute::post('payment', 'OrderController@storePayment')->name('customer.savePayment');

});