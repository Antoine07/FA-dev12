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

/*Route::get('/', function () {
    return "hello laravel";
   // return view('welcome');
});*/

Route::get('/', 'FrontController@index');

// une autre route
Route::get('/posts', function () {
    return "hello posts";
    // return view('welcome');
});
// passer un paramètre variable dans l'uri 
/*Route::get('/post/{id}', function ($id) {
    return "post: $id";
    // return view('welcome');
});*/

Route::get('/post/{id}', 'FrontController@show');
Route::get('/category/{id}', 'FrontController@showPostByCat');
Route::get('/student/{id}', 'FrontController@showStudent');




// passer un paramètre variable dans l'uri 
Route::get('/category/{title}/{id}', function ($title, $id) {
    return "titre de la catégorie: $title, et id de la category: $id";
    // return view('welcome');
});

Route::get('test', function () {
    $posts = [['title' => 'php7'], ['title' => 'mysql']];

    extract(['data' => $posts, 'foo' => 125, 'bar' => 100]);
    var_dump($foo);
    var_dump($bar);
    dd($data);

});


