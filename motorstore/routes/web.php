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

Route::get('/', 'HomeController@index')->middleware('locale');
Route::group([
    'prefix' => 'admin',
    'middleware' => [
        'locale',
        'checkadmin',
    ],
], function(){
    Route::get('user', 'AdminController@userpage')->name('userpage');
    Route::get('cate', 'AdminController@catepage')->name('catepage');
    Route::get('product', 'AdminController@productpage')->name('productpage');
    Route::get('branch', 'AdminController@branchpage')->name('branchpage');
    Route::get('order', 'AdminController@orderpage')->name('orderpage');
    Route::get('contact', 'AdminController@contactpage')->name('contactpage');
    Route::get('post', 'PostController@post_page')->name('post_page');
    Route::get('addpost', 'PostController@add_post')->name('add_post');
    Route::post('addpost', 'PostController@store_post')->name('store_post');
    Route::get('editpost/{id}', 'PostController@edit_post')->name('edit_post');
    Route::post('updatepost/{id}', 'PostController@update_post')->name('update_post');
    Route::post('deletepost', 'PostController@delete_post')->name('delete_post');
    Route::post('deletecontact', 'ContactController@delete_contact')->name('delete_contact');


    Route::get('user/{id}', 'AdminController@edit_user')->name('edit_user');
    Route::post('user/{id}', 'AdminController@update_user')->name('update_user');

    Route::post('deleteuser', 'AdminController@delete_user')->name('delete_user');
    Route::get('addcate', 'AdminController@create_category')->name('add_cate');
    Route::post('cate', 'AdminController@store_category')->name('store_cate');
    Route::get('editcate/{id}', 'AdminController@edit_cate')->name('edit_cate');
    Route::post('editcate/{id}', 'AdminController@update_cate')->name('update_cate');
    Route::post('deletecate', 'AdminController@delete_cate')->name('delete_cate');
    Route::post('deleteproduct', 'AdminController@delete_product')->name('delete_product');
    Route::get('addproduct', 'AdminController@create_product')->name('add_product');
    Route::post('addproduct', 'AdminController@store_product')->name('store_product');
    Route::get('editproduct/{id}', 'AdminController@edit_product')->name('edit_product');
    Route::post('editproduct/{id}', 'AdminController@update_product')->name('update_product');
    Route::get('addbranch', 'AdminController@create_branch')->name('add_branch');
    Route::post('addbranch', 'AdminController@store_branch')->name('store_branch');
    Route::get('editbranch/{id}', 'AdminController@edit_branch')->name('edit_branch');
    Route::post('editbranch/{id}', 'AdminController@update_branch')->name('update_branch');
    Route::post('deletebranch', 'AdminController@delete_branch')->name('delete_branch');
    Route::post('deleteorder', 'AdminController@delete_order')->name('delete_order');
    Route::get('admin/branch{id}','AdminController@branch_info')->name('branch_info');

});
Route::get('admin', 'HomeController@admin')->name('adminpage')->middleware('checkadmin','locale');

Route::group([
    'middleware' => 'locale',
], function() {
Route::get('cate/catepage{id}', 'CategoryController@cate_page')->name('cate_page');
Route::get('change_lang/{language}', 'HomeController@change_lang')->name('change_lang');
Route::get('cate/product{id}', 'CategoryController@product_page')->name('product_page');
Route::get('userpage/{id}', 'HomeController@user_profile')->name('user_page');
Route::post('userpage/{id}', 'HomeController@update_users')->name('update_users');
Route::get('contact', 'ContactController@index')->name('contact_page');
Route::post('contact', 'ContactController@store_contact')->name('store_contact');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('addcart/{id}', 'CartController@add_cart')->name('add_cart');
Route::get('cartinfo', 'CartController@get_cart')->name('get_cart');
Route::get('delete_cart/{id}', 'CartController@delete_cart')->name('delete_cart');
Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('storecheckout', 'CartController@store_checkout')->name('store_checkout');
});
