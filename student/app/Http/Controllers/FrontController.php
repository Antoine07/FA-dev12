<?php

namespace App\Http\Controllers;

use App\Category;
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

        //return view('home', ['posts' => $posts, 'students' => $students]);

        return view('front.home', compact('posts', 'students'));
    }

    public function show($id)
    {

        $post = Post::find($id);

        return view('front.show', ['post' => $post]);

    }

    public function showStudent($id)
    {

        $student = Student::find($id);

        return view('front.student.show', compact('student'));

    }

    public function showPostByCat($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        $posts = $category->posts;

        return view('category', [
            'title' => $title,
            'posts' => $posts
        ]);

    }

}
