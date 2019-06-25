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
    return view('index');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('admin', 'HomeController@admin')->middleware('checkadmin');

Route::get('admin/user', 'AdminController@userpage')->name('userpage');
Route::get('admin/cate', 'AdminController@catepage')->name('catepage');
Route::get('admin/product', 'AdminController@productpage')->name('productpage');
Route::get('admin/branch', 'AdminController@branchpage')->name('branchpage');
Route::get('admin/order', 'AdminController@orderpage')->name('orderpage');
Route::get('admin/contact', 'AdminController@contactpage')->name('contactpage');

Route::get('admin/edituser/{id}', 'AdminController@edit_user')->name('edit_user');
Route::post('admin/edituser/{id}', 'AdminController@update_user')->name('update_user');

Route::post('admin/deleteuser', 'AdminController@delete_user')->name('delete_user');

Route::get('admin/addcate', 'AdminController@create_category')->name('add_cate');
Route::post('admin/cate', 'AdminController@store_category')->name('store_cate');
Route::get('admin/editcate/{id}', 'AdminController@edit_cate')->name('edit_cate');
Route::post('admin/editcate/{id}', 'AdminController@update_cate')->name('update_cate');
Route::post('admin/deletecate', 'AdminController@delete_cate')->name('delete_cate');
Route::get('admin/addproduct', 'AdminController@create_product')->name('add_product');
Route::post('admin/addproduct', 'AdminController@store_product')->name('store_product');
Route::get('admin/editproduct/{id}', 'AdminController@edit_product')->name('edit_product');
Route::post('admin/editproduct/{id}', 'AdminController@update_product')->name('update_product');
Route::get('admin/addbranch', 'AdminController@create_branch')->name('add_branch');
Route::post('admin/addbranch', 'AdminController@store_branch')->name('store_branch');
Route::get('admin/editbranch/{id}', 'AdminController@edit_branch')->name('edit_branch');
Route::post('admin/editbranch/{id}', 'AdminController@update_branch')->name('update_branch');
Route::post('admin/deletebranch', 'AdminController@delete_branch')->name('delete_branch');

