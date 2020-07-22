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

Auth::routes();
Route::get('/', 'WelcomeController@list');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@list');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/store', 'PostsController@store')->name('image');
Route::get('/posts/edit/{id}/', 'PostsController@edit');
Route::put('/posts/update/{id}/', 'PostsController@update');
Route::get('/posts/destroy/{id}', 'PostsController@delete');

Route::get('/posts/postDetail/{id}', 'PostDetailController@detail');


