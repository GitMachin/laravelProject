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
Route::resource($name = 'posts', $controller = 'PostsController');

Route::get('/', function () {
    return view('welcome');
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

Route::get('users', 'UserController@getList' )->name('users');
Route::get('users.data', 'UserController@dtAjax' )->name('users.data');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
