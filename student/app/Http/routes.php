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
// une autre route
Route::get('/posts', function () {
    return "hello posts";
    // return view('welcome');
});
// passer un paramètre variable dans l'uri 
Route::get('/post/{id}', function ($id) {
    return "post: $id";
    // return view('welcome');
});
