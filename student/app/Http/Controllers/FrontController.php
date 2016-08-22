<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $posts = [['title' => 'php7'],['title' => 'mysql']];

        return view('home', ['posts' => $posts]);
    }
}
