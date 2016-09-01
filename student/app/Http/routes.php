<?php

Route::pattern('id', '[1-9][0-9]*'); // * 0, N
Route::pattern('slug', '[a-zA-Z\-]+');   // + 1, N

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

Route::get('/post/{id}/{slug?}', 'FrontController@show');
Route::get('/category/{id}/{slug?}', 'FrontController@showPostByCat');
Route::get('/student/{id}', 'FrontController@showStudent');
Route::get('/user/{id}', 'FrontController@showPostByUser');
Route::get('/tag/{id}', 'FrontController@showPostByTag');

Route::any('login','LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::resource('admin/post', 'PostController');


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


