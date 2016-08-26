@extends('layouts.master')
@section('content')
<h1>Edit Post</h1>
 <form class="form-horizontal" method="POST" action="{{ action('PostsController@update', $post->id) }}">
   <input type="hidden" name="_method" value="PUT">
      {{ method_field('PUT') }}
      {!! csrf_field() !!}
   <div class="form-group">
     <label for="title">Title:</label>
       <input
         class="form-control"
         type="text"
         name="title"
         id="title"
         value="{{ empty(old('title')) ? $post->title : old('title') }}">
   </div>
   @if ($errors->has('title'))
     {!! $errors->first('title', '<span class="help-block bg-danger">:message</span>') !!}
   @endif
   <div class="form-group">
     <label for="url">Url:</label>
     <input
     class="form-control"
     type="text"
     name="url"
     id="url"
     value="{{ empty(old('url')) ? $post->url : old('url') }}">
   </div>
   @if ($errors->has('url'))
   {!! $errors->first('url', '<span class="help-block bg-danger">:message</span>') !!}
   @endif
   <div class="form-group">
       <label for="content">Content:</label>
           <textarea type="text"
           class="form-control"
           name="content">{{ empty(old('content')) ? $post->content : old('content') }}</textarea>
</textarea>
   </div>
   @if ($errors->has('content'))
     {!! $errors->first('content', '<span class="help-block bg-danger">:message</span>') !!}
   @endif
     <button type="submit" class="btn btn-success">Update</button>
 </form>
@stop
