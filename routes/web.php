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

Route::get('/', function () {
    return view('welcome');
});


//pages
Route::get('/',                    'PageController@home');
Route::get('aboutUs',              'PageController@aboutUs');
Route::get('contactUs',            'PageController@contactUs');
Route::get('faq',                  'PageController@faq');
Route::get('categoryList',         'PageController@categoryList');
Route::get('productList/{id}',     'PageController@productList');
Route::get('singleProduct/{id}',   'PageController@product');
Route::post('contactSubmit',       'PageController@contactSubmit');


Route::get('cart', 'CartController@cart');
Route::get('checkOutPage', 'CartController@checkOutPage');
Route::get('removeFromCart/{id}', 'CartController@removeFromCart');
Route::get('paymentSuccess', 'CartController@paymentSuccess');

Route::post('addToBasket', 'CartController@addToBasket');
Route::post('addToCart', 'CartController@addToCart');
Route::post('updateQuantity', 'CartController@updateQuantity');



Route::post('response', 'CartController@response');
Route::get('checkout_failed', 'CartController@checkoutFailed');
Route::get('checkout_success', 'CartController@checkoutSuccess');



//users
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//manager
Route::prefix('manager')->group(function(){
  Route::any('/',                'ManagerController@index')->name('manager.index');
  Route::any('new',              'ManagerController@new')->name('manager.new');
  Route::any('{manager}',        'ManagerController@single')->name('manager.single');
  Route::any('{manager}/edit',   'ManagerController@edit')->name('manager.edit');
  Route::any('{manager}/delete', 'ManagerController@delete')->name('manager.delete');
});



//admin
Route::prefix('admin')->group(function(){
  Route::any('/',              'AdminController@index')->name('admin.index');
  Route::any('new',            'AdminController@new')->name('admin.new');
  Route::any('{admin}',        'AdminController@single')->name('admin.single');
  Route::any('{admin}/edit',   'AdminController@edit')->name('admin.edit');
  Route::any('{admin}/delete', 'AdminController@delete')->name('admin.delete');
});



//client
Route::prefix('client')->group(function(){
  Route::any('/',               'ClientController@index')->name('client.index');
  Route::any('new',             'ClientController@new')->name('client.new');
  Route::any('{client}',        'ClientController@single')->name('client.single');
  Route::any('{client}/edit',   'ClientController@edit')->name('client.edit');
  Route::any('{client}/delete', 'ClientController@delete')->name('client.delete');
});



//category
Route::prefix('category')->group(function(){
  Route::any('/',                 'CategoryController@index')->name('category.index');
  Route::any('new',               'CategoryController@new')->name('category.new');
  Route::any('{category}',        'CategoryController@single')->name('category.single');
  Route::any('{category}/edit',   'CategoryController@edit')->name('category.edit');
  Route::any('{category}/delete', 'CategoryController@delete')->name('category.delete');
});

//products

Route::prefix('product')->group(function(){
  Route::any('/',                'ProductController@index')->name('product.index');
  Route::any('new',              'ProductController@new')->name('product.new');
  Route::any('{product}',        'ProductController@single')->name('product.single');
  Route::any('{product}/edit',   'ProductController@edit')->name('product.edit');
  Route::any('{product}/delete', 'ProductController@delete')->name('product.delete');
});


//orders

Route::prefix('order')->group(function(){
  Route::any('/',              'OrderController@index')->name('order.index');
  Route::any('new',            'OrderController@new')->name('order.new');
  Route::any('{order}',        'OrderController@single')->name('order.single');
  Route::any('{order}/edit',   'OrderController@edit')->name('order.edit');
  Route::any('{order}/delete', 'OrderController@delete')->name('order.delete');
});


//payments

Route::prefix('payment')->group(function(){
  Route::any('/',                'PaymentController@index')->name('payment.index');
  Route::any('new',              'PaymentController@new')->name('payment.new');
  Route::any('{payment}',        'PaymentController@single')->name('payment.single');
  Route::any('{payment}/edit',   'PaymentController@edit')->name('payment.edit');
  Route::any('{payment}/delete', 'PaymentController@delete')->name('payment.delete');
});


//sell

Route::prefix('sell')->group(function(){
  Route::any('/',             'SellController@index')->name('sell.index');
  Route::any('new',           'SellController@new')->name('sell.new');
  Route::any('{sell}',        'SellController@single')->name('sell.single');
  Route::any('{sell}/edit',   'SellController@edit')->name('sell.edit');
  Route::any('{sell}/delete', 'SellController@delete')->name('sell.delete');
});


//refunds
Route::prefix('refund')->group(function(){
  Route::any('/',               'RefundController@index')->name('refund.index');
  Route::any('new',             'RefundController@new')->name('refund.new');
  Route::any('{refund}',        'RefundController@single')->name('refund.single');
  Route::any('{refund}/edit',   'RefundController@edit')->name('refund.edit');
  Route::any('{refund}/delete', 'RefundController@delete')->name('refund.delete');
});


//media
Route::prefix('media')->group(function(){
  Route::any('/',              'MediaController@index')->name('media.index');
  Route::any('new',            'MediaController@new')->name('media.new');
  Route::any('{media}',        'MediaController@single')->name('media.single');
  Route::any('{media}/delete', 'MediaController@delete')->name('media.delete');
});


//refunds
Route::prefix('profile')->group(function(){
  Route::any('{profile}',        'ProfileController@single')->name('profile.single');
  Route::any('{profile}/edit',   'ProfileController@edit')->name('profile.edit');
  Route::any('{profile}/delete', 'ProfileController@delete')->name('profile.delete');
});









