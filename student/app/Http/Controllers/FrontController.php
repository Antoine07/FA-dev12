<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        //$posts = [['title' => 'php7'],['title' => 'mysql']];

        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }

    public function show($id)
    {

        $post = Post::find($id);

        return view('show', ['post' => $post]);

    }

}
