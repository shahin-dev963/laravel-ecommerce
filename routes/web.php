<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontEndController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');

Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//=======================adming route =================

//=======category route =========
Route::get('admin/categories', 'Admin\CategoryController@index')->name('admin.category');
Route::post('admin/category-name', 'Admin\CategoryController@store')->name('store.category');
Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('admin/category/update', 'Admin\CategoryController@update')->name('update.category');
Route::get('admin/category/delete/{id}', 'Admin\CategoryController@delete');
Route::get('admin/category/inactive/{id}', 'Admin\CategoryController@inactive');
Route::get('admin/category/active/{id}', 'Admin\CategoryController@active');

//=====================brand route ====================
Route::get('admin/brands', 'Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-name', 'Admin\BrandController@store')->name('store.brand');
Route::get('admin/brand/edit/{id}', 'Admin\BrandController@edit');
Route::post('admin/brand/update', 'Admin\BrandController@update')->name('update.brand');
Route::get('admin/brand/delete/{id}', 'Admin\BrandController@delete');
Route::get('admin/brand/inactive/{id}', 'Admin\BrandController@inactive');
Route::get('admin/brand/active/{id}', 'Admin\BrandController@active');

//====================product=========================
Route::get('admin/products/add', 'Admin\ProductController@addProduct')->name('admin.add-products');
Route::post('admin/products/store', 'Admin\ProductController@store')->name('store-product');
Route::get('admin/products/manage', 'Admin\ProductController@manageProduct')->name('manage-products');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit');
Route::post('admin/product/update', 'Admin\ProductController@update')->name('update-product');
Route::post('admin/product/update-image', 'Admin\ProductController@updateImage')->name('update-image');
Route::get('admin/product/delete/{id}', 'Admin\ProductController@destroy');
Route::get('admin/product/inactive/{id}', 'Admin\ProductController@inactive');
Route::get('admin/product/active/{id}', 'Admin\ProductController@active');

//=====================coupon=========================
Route::get('admin/coupon', 'Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon/store', 'Admin\CouponController@store')->name('store.coupon');
Route::get('admin/coupon/edit/{id}', 'Admin\CouponController@edit');
Route::post('admin/coupon/update', 'Admin\CouponController@update')->name('update.coupon');
Route::get('admin/coupon/delete/{id}', 'Admin\CouponController@delete');
Route::get('admin/coupon/inactive/{id}', 'Admin\CouponController@inactive');
Route::get('admin/coupon/active/{id}', 'Admin\CouponController@active');

 //==================== orders ==================
Route::get('admin/orders', 'Admin\OrderController@index')->name('admin.orders');
Route::get('admin/orders/view/{id}', 'Admin\OrderController@view');

//=======================frontend=======================

//=======================cart========================
Route::post('add/to-cart/{product_id}', 'CartController@addToCart');
Route::get('cart', 'CartController@cartPage');
Route::get('cart/destroy/{id}', 'CartController@destroy');
Route::post('cart/quantity/update/{id}', 'CartController@update');
Route::post('coupon/apply', 'CartController@couponApply');
Route::get('coupon/destroy', 'CartController@couponDestroy');

//=====================wishlist======================
Route::get('add/to-wishlist/{id}', 'WishlistController@addToWishlist');
Route::get('wishlist', 'WishlistController@wishlistPage');
Route::get('wishlist/destroy/{id}', 'WishlistController@destroy');

//================== shop page =================
Route::get('shop', 'FrontEndController@shopPage')->name('shop.page');

//======================== product details ==================
Route::get('product/details/{id}', 'FrontEndController@productDetail');

//======================= category wise product show =========
Route::get('category/product-show/{id}', 'FrontEndController@categoryWiseProduct');


//==========================checkout page================
Route::get('checkout', 'CheckoutController@index');
Route::post('place/order', 'CheckoutController@orderStore')->name('place-order');
Route::get('order/success', 'CheckoutController@orderSuccess');

//=========================== user route ==================

Route::get('user/order', 'UserController@order')->name('user.order');
Route::get('user/order-view/{id}', 'UserController@orderView');

//=================== footer ================
Route::get('privacy/policy', 'FrontEndController@privacyPolicy');
Route::get('cookie/policy', 'FrontEndController@cookiePolicy');
Route::get('purchase/policy', 'FrontEndController@purchasePolicy');
Route::get('terms/condition', 'FrontEndController@termsCondition');


// =================== contact us ======================
Route::get('contact/us', 'FrontEndController@contactUs');
Route::post('contact/store', 'FrontEndController@contactStore')->name('contact.us');
