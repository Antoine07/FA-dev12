<?php

Route::pattern('id', '[1-9][0-9]*'); // * 0, N
Route::pattern('slug', '[a-zA-Z\-]+');   // + 1, N

Route::get('/', 'FrontController@index')->name('home');


Route::get('/post/{id}/{slug?}', 'FrontController@show');
Route::get('/category/{id}/{slug?}', 'FrontController@showPostByCat');
Route::get('/student/{id}', 'FrontController@showStudent');
Route::get('/user/{id}', 'FrontController@showPostByUser');
Route::get('/tag/{id}', 'FrontController@showPostByTag');

Route::any('login','LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::resource('admin/post', 'PostController');
