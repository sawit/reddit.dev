<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    public function index() {
        $posts = Post::with('user')->paginate(10);
		    return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post = new Post();
        $post->created_by = Auth::user()->id;
        Log::info($request->all());
        // Auth::id;
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
      $post = Post::withTrashed()->where('id', $id)->first();
      if (!$post) {
            abort(404);
      }
      return view('posts.edit')->with('post', $post);

      // view('posts.edit', ['post' => $post]);
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
            return redirect()->action('PostsController@index');
        }

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
