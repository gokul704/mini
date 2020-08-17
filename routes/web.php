<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('change-password', 'ChangePasswordController@index');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
Route::resource('users', 'UserController')->middleware('is_admin');
// Route::resource('/users/create/create','UserController')->middleware('is_admin');  
// Route::resource('/users/delete/{{id}}','UserController')->middleware('is_admin');  
// Route::resource('/users/{{id}}/edit/{{id}}','UserController')->middleware('is_admin')->name('users.update');  
// Route::resource('/users/{{id}}/store   ','UserController')->middleware('is_admin');  

