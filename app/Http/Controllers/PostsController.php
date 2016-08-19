<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
// use Illuminate\Database\Eloquent\SoftDeletes;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index')->with(array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'url' => 'required'
        ];
        $this->validate($request, $rules);
        return redirect()->action('PostsController@index');

        $post = new Post();
        $post->title = $request->input('title');
        $post->url = $request->url;
        $post->content = $request->input('content');
        $post->created_by = 1;
        $post->save();

        $value = $request->session()->get('key');
         
        if ($request->session()->has('key')) {
            $value = $request->session('key');
        } else {
            $request->session()->put('key', 'value');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);

        if(!$post) {
            Log::info("Post with ID $id can't be found!");
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'Hello Kings from the edit function!';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // use SoftDeletes;
        $post = Post::find($id);
        if(!$post) {
            session()->flash('message', 'Post was not found');
        } else {
            $post->delete();
            session()->flash('message', 'Post deleted');
            
        }
        return redirect()->action('PostsController@index');

    }
}
