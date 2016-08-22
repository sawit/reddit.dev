<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;


class PostsController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index')->with(array('posts' => $posts));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->$request->input('title');
        $post->$request->input('url');
        $post->$request->input('content');
        $post->created_by->input('user');
        Auth::user();
        return $this->validateAndSave($post, $request);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);

        if(!$post) {
            Log::info("Post with ID $id can't be found!");
            abort(404);
        }
    }

    public function edit($id)
    {
        return 'Hello Kings from the edit function!';
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        return $this->validateAndSave($post, $request);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post) {
            session()->flash('message', 'Post was not found');
        } else {
            $post->delete();
            session()->flash('message', 'Post deleted');

        }
        return redirect()->action('PostsController@index');

    }
    
    private function validateAndSave(Post $post, Request $request) {
        $request->session()->flash('ERROR_MESSAGE', 'Post not created');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post->title = $request->input('title');
        $post->url = $request->url;
        $post->content = $request->input('content');
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post created');
        return redirect()->action('PostsController@index');
    }
}
