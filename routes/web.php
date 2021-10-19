<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AdminController;
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


// Route::get('hi', function () {
//     return view('index');

// });

Route::get('admin', 'AdminController@index');
Route::get('admin/update', 'AdminController@updatepassword');

Route::post('admin/auth', 'AdminController@auth')->name('admin.auth');
Route::group(['middleware'=>'Admin_auth'],function(){
    

Route::get('admin/dashboard', 'AdminController@dashboard');
Route::get('admin/category', 'CategoryController@index');
Route::get('admin/manage_category', 'CategoryController@manageCategory');
Route::post('admin/add_category', 'CategoryController@storeCategory')->name('add.category');
Route::get('admin/category/edit/{id}', 'CategoryController@edit');
Route::post('admin/category/edit_category', 'CategoryController@update')->name('edit.category');
Route::get('admin/category/delete/{id}','CategoryController@delete');
Route::get('admin/category/status/{status}/{id}','CategoryController@status');
//coupons route
Route::get('admin/Coupon', 'CouponController@index');
Route::get('admin/Coupon/add', 'CouponController@show')->name('coupon');
Route::post('admin/Coupon/create', 'CouponController@create')->name('add.coupon');
Route::get('admin/Coupon/status/{status}/{id}','CouponController@status');
Route::get('admin/Coupon/edit/{id}', 'CouponController@edit');
Route::post('admin/Coupon/edit_coupon', 'CouponController@update')->name('edit.coupon');
Route::get('admin/Coupon/delete/{id}','CouponController@destroy');

//size route
Route::get('admin/Size', 'SizeController@index');
Route::get('admin/Size/add', 'SizeController@show')->name('size');
Route::post('admin/Size/create', 'SizeController@create')->name('add.size');
Route::get('admin/Size/status/{status}/{id}','SizeController@status');
Route::get('admin/Size/edit/{id}', 'SizeController@edit');
Route::post('admin/Size/edit_coupon', 'SizeController@update')->name('edit.size');
Route::get('admin/Size/delete/{id}','SizeController@destroy');

//color route
Route::get('admin/Color', 'colorController@index');
Route::get('admin/Color/add', 'colorController@show')->name('color');
Route::post('admin/Color/create', 'colorController@create')->name('add.color');
Route::get('admin/Color/status/{status}/{id}','colorController@status');
Route::get('admin/Color/edit/{id}', 'colorController@edit');
Route::post('admin/Color/edit_coupon', 'colorController@update')->name('edit.color');
Route::get('admin/Color/delete/{id}','colorController@destroy');

//product
Route::get('admin/Product', 'ProductController@index');
Route::get('admin/Product/add', 'ProductController@show')->name('product');
Route::post('admin/Product/create', 'ProductController@create')->name('add.product');
Route::get('admin/Color/status/{status}/{id}','colorController@status');
Route::get('admin/Product/edit/{id}', 'ProductController@show');
Route::post('admin/Color/edit_coupon', 'colorController@update')->name('edit.product');
Route::get('admin/Color/delete/{id}','colorController@destroy');

//Route::get('admin/updatepassword', 'AdminController@updatepassword');
Route::get('admin/logout', function () {
    session()->forget('Admin_login');
    session()->forget('Admin_Id');
    session()->flash('error','logout success');
    return redirect('admin');
});

});