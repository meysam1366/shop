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

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('slider','SliderController');
    Route::resource('brand','BrandController');
    Route::resource('color','ColorController');
    Route::resource('discount','DiscountController');
    Route::resource('product','ProductController');
    Route::get('option_product','OptionController@option_product')->name('option_product');
    Route::post('option_product','OptionController@option_product_store')->name('option_product_store');
    Route::get('get_item_field','OptionController@get_item_field')->name('get_item_field');
    Route::resource('option','OptionController');
    Route::resource('image','ImageController');
    Route::resource('rate','RateController');
    Route::get('comment/status/{id}','CommentController@status')->name('changeStatusComment');
    Route::resource('comment','CommentController');
    Route::resource('user','UserController');
});

Route::namespace('Front')->group(function () {
    // Authentication Routes...
    Route::get('login', 'UserController@showLoginForm')->name('login_user');
    Route::post('login', 'UserController@login_user')->name('login_user_post');
    Route::post('logout', 'UserController@logout_user')->name('logout_user');
    Route::get('register', 'UserController@showRegistrationForm')->name('register_user');
    Route::post('register', 'UserController@register_user')->name('register_user_post');
    Route::get('password/reset', 'UserController@showLinkRequestForm')->name('password.request.user');
    Route::post('password/email', 'UserController@sendResetLinkEmail')->name('password.email.user');
    Route::get('password/reset/{token}', 'UserController@showResetForm')->name('password.reset.user');
    Route::post('password/reset', 'UserController@reset')->name('password.update.user');
    Route::get('product/{slug}','ProductController@single_product')->name('single_product');
});

Route::get('account', 'HomeController@my_account')->middleware('auth')->name('my_account');

Route::get('/', 'HomeController@index')->name('/');

Route::namespace('Auth')->prefix('auth')->group(function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::get('/home', 'HomeController@index')->name('home');
