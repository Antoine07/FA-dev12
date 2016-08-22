<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return "hello laravel";
   // return view('welcome');
});

Route::get('/posts', function () {
    return "hello posts";
    // return view('welcome');
});

Route::get('/post/{id}', function ($id) {
    return "post: $id";
    // return view('welcome');
});
