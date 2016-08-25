<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Vote;
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

    public function index(Request $request) {
      $searchQuery = $request->input('search');

      if (!is_null($searchQuery)) {
         $posts =  Posts::searchContentTitleOwner($searchQuery)->orderBy('created_at', 'ASC')->with('user')->paginate(10);
      } else {
        $posts = Post::with('user')->orderBy('created_at', 'ASC')->paginate(10);
      }

      $data = compact('searchTerm', 'posts');

     return view('posts.index')->with($data);

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

    public function show(Request $request, $id)
    {
      $post = Post::with('user')->findOrFail($id);
       if ($request->user()) {
           $user_vote = $post->userVote($request->user());
       } else {
           $user_vote = null;
       }

       $data = compact('post', 'user_vote');
       return view('posts.show')->with($data);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
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
    public function search(Post $post, Request $request)
  	{
  		$search = $request->input('search');
  		if ($search) {
  			$results = Post::searchPosts($search);
  		}
  		return view('posts.results', ['search' => $results]);
  	}

    private function validateAndSave(Post $post, Request $request) {
        $request->session()->flash('ERROR_MESSAGE', 'Post not created');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post created');
        return redirect()->action('PostsController@index');
    }

    public function addVote(Request $request) {
        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->input('post_id'),
            'user_id' => $request->user()->id
        ]);
        $vote->vote->input('vote');
        $vote->save();

        $post = $vote->post;
    }
}
