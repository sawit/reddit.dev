<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $posts = Post::all();
        dd($posts);
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
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'url' => 'required'
        ];
        $this->validate($request, $rules);

        $post = new Post();
        $post->title = $request->input('title');
        $post->url = $request->url;
        $post->content = $request->input('content');
        $post->created_by = 1;
        $post->save();

        // return redirect()->action('PostsController@index');

        // @if($errors->has('field')) 
        //     {{!! $errors->first('field', '<span class="help-block">:message</span>');
        //     !!}}
        // @endif


        // @include('partials.errors', ['field' => 'title']);
        // @include('partials.errors', ['field' => 'url']);
        // // @include('view-name', )
        

   
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
        return 'Hello Kings from the destroy function!';
    }
}
