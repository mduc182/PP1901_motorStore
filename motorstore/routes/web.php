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

