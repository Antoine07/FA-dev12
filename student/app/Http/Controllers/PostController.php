<?php

namespace App\Http\Controllers;

use Gate;
use App\Tag;
use App\User;
use App\Post;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['index']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        $users = User::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.post.create', compact('categories', 'users', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required',
            'category_id' => 'integer',
            'user_id' => 'integer',
            'status' => 'in:published,unpublished,draft',
            'published_at' => 'date',
            'tags.*' => 'integer'
        ]);

        $post = Post::create($request->all());

        $post->tags()->attach($request->input('tags'));

        return redirect('admin/post')->with('message', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::lists('title', 'id');
        $users = User::lists('name', 'id');

        return view('admin.post.edit', compact('post', 'categories', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required',
            'category_id' => 'integer',
            'user_id' => 'integer',
            'status' => 'in:published,unpublished,draft',
            'published_at' => 'date',
        ]);

        $post = Post::find($id);

        $post->update($request->all());

        return redirect('admin/post')->with(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/post')->with( ['message' => 'success delete']);
    }
}
