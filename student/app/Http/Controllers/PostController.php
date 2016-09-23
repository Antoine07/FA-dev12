<?php

namespace App\Http\Controllers;

use Gate;
use File;
use App\Tag;
use App\User;
use App\Post;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function __construct() {
        //$this->middleware('auth', ['except'=>['index']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::with('category', 'tags')->paginate(10);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
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
    public function store(Request $request) {

        $request->user()->can('store-post');

        $this->validate($request, [
                'title'        => 'required|max:100',
                'content'      => 'required',
                'category_id'  => 'integer',
                'user_id'      => 'integer',
                'status'       => 'in:published,unpublished,draft',
                'published_at' => 'date',
                'tags.*'       => 'integer',
                'thumbnail'    => 'image'
        ]);

        $post = Post::create($request->all());

        $post->tags()->attach($request->input('tags'));

        $this->upload($request->file('thumbnail'), $post);

        return redirect('admin/post')->with('message', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $post = Post::with('category', 'tags')->findOrFail($id);

        $this->authorize('show-post', $post);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::find($id);
        $categories = Category::lists('title', 'id');
        $users = User::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.post.edit', compact('post', 'categories', 'users', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
                'title'        => 'required|max:100',
                'content'      => 'required',
                'category_id'  => 'integer',
                'user_id'      => 'integer',
                'status'       => 'in:published,unpublished,draft',
                'published_at' => 'date',
                'tags.*'       => 'integer',
                'delete_image' => 'in:delete',
                'thumbnail'    => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $post = Post::find($id);

        $post->update($request->all());

        $tags = empty($request->input('tags')) ? [] : $request->input('tags');

        $post->tags()->sync($tags);

        if (!empty($request->delete_image)) {
            $this->deleteImage($post->thumbnail);
            $post->thumbnail = null;

            $post->save();
        }

        $this->upload($request->file('thumbnail'), $post);

        return redirect('admin/post')->with(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {

        if ($request->ajax()) {
            $post = Post::findOrFail($id);

            $this->deleteImage($post->thumbnail);

            $post->delete();

            return response(['message' => 'success delete'], 200);
        }

        //return redirect('admin/post')->with( ['message' => 'success delete']);
    }

    private function upload($im, Post $post) {

        if (!empty($im)) {
            $ext = $im->getClientOriginalExtension();
            $uri = str_random(12) . '.' . $ext;

            $this->deleteImage($post->thumbnail);

            $post->thumbnail = $uri;

            $im->move(env('UPLOAD_PATH', './images'), $uri);

            $post->save(); // mise à jour dans la base de données
        }
    }

    private function deleteImage($uri) {
        $fileName = public_path(env('UPLOAD_PATH', './images')) . '/' . $uri;

        if (File::exists($fileName)) {
            File::delete($fileName);

            return true;
        }

        return false;
    }
}
