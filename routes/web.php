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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create','PostController@create')->name('create');
Route::post('/store','PostController@store')->name('store');
Route::get('/post', 'PostController@index')->name('homepost'); 
Route::get('/', 'PostController@index'); 
Route::get('/edit/post/{id}','PostController@edit')->name('editpost');
Route::post('/edit/post/{id}','PostController@update');
Route::get('/delete/post/{id}','PostController@destroy')->name('deletepost');
