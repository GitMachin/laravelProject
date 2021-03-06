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

Route::get('/carbons', function () {
    return view('carbons');
});

Route::get('/forms', function () {
    return view('forms');
});

Route::get('/datatables', function () {
    return view('datatables');
});

Route::get('users', 'UserController@getList' )->name('users');
Route::get('users.data', 'UserController@dtAjax' )->name('users.data');

