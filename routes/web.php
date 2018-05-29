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

/**
 * POSTS
 */
Route::resource($name		 = 'posts', $controller	 = 'PostsController');
Route::get('posts', 'PostsController@getList')->name('posts');
Route::get('posts.data', 'PostsController@dtAjax')->name('posts.data');

/**
 * USERS
 * @todo rename UserController -> UsersController
 */
Route::resource($name		 = 'users', $controller	 = 'UserController');
Route::get('users', 'UserController@getList')->name('users');
Route::get('users.data', 'UserController@dtAjax')->name('users.data');

/**
 * OTHERS ROUTES..
 */
Route::get('/', function () {
	return view('welcome');
});

Route::get('/phpinfo', function () {
	return view('phpinfo');
});

Route::get('/forms', function () {
	return view('forms');
});

Route::get('/carbons', function () {
	return view('carbons');
});

Route::get('/datatables', function () {
	return view('datatables');
});
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');