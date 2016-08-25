<?php

namespace App\Http\Controllers;

use App\Post;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        //$posts = [['title' => 'php7'],['title' => 'mysql']];

        $posts = Post::all();
        $students = Student::all();

        return view('home', ['posts' => $posts, 'students' => $students]);
    }

    public function show($id)
    {

        $post = Post::find($id);

        return view('show', ['post' => $post]);

    }

    public function showStudent($id)
    {

        $student = Student::find($id);

        return view('student', ['student' => $student]);

    }

}
