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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::post('roles', 'RoleController@store')->name('roles.store')->middleware('role:Super Admin')->middleware('auth');
Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('role:Super Admin')->middleware('auth');
Route::get('roles/{roles}', 'RoleController@show')->name('roles.show')->middleware('role:Super Admin')->middleware('auth');
Route::patch('roles/{roles}', 'RoleController@update')->name('roles.update')->middleware('role:Super Admin')->middleware('auth');
Route::delete('roles/{roles}', 'RoleController@destroy')->name('roles.destroy')->middleware('role:Super Admin')->middleware('auth');;
Route::get('roles/{roles}/edit', 'RoleController@edit')->name('roles.edit')->middleware('role:Super Admin')->middleware('auth');


Route::get('users', 'UserController@index')->name('users.index')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::post('users', 'UserController@store')->name('users.store')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::get('users/create', 'UserController@create')->name('users.create')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::get('users/{users}', 'UserController@show')->name('users.show')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::patch('users/{users}', 'UserController@update')->name('users.update')->middleware('role:Admin|Super Admin')->middleware('auth');
Route::delete('users/{users}', 'UserController@destroy')->name('users.destroy')->middleware('role:Super Admin')->middleware('auth');;
Route::get('users/{users}/edit', 'UserController@edit')->name('users.edit')->middleware('role:Admin|Super Admin')->middleware('auth');


Route::get('products', 'ProductController@index')->name('products.index')->middleware('role:Admin|Super Admin|USER')->middleware('auth');
Route::post('products', 'ProductController@store')->name('products.store')->middleware('role:Super Admin|USER|Admin')->middleware('auth');
Route::get('products/create', 'ProductController@create')->name('products.create')->middleware('role:Super Admin|USER|Admin')->middleware('auth');
Route::get('products/{products}', 'ProductController@show')->name('products.show')->middleware('role:Super Admin|USER|Admin')->middleware('auth');
Route::patch('products/{products}', 'ProductController@update')->name('products.update')->middleware('role:Super Admin|USER|Admin')->middleware('auth');
Route::delete('products/{products}', 'ProductController@destroy')->name('products.destroy')->middleware('role:Super Admin|Admin')->middleware('auth');;
Route::get('products/{products}/edit', 'ProductController@edit')->name('products.edit')->middleware('role:Super Admin|USER|Admin')->middleware('auth');
