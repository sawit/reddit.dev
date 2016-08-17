@extends('layouts.master')
@section('content')

	<form method="POST" action="/users">
		{!! csrf_field() !!}
		Title: <input type="text" name="title" required autofocus><br>
		URL: <input type="text" name="url"><br>
		Content: <textarea name="content" rows="5" cols="40" required><br>
		</textarea>
		<input type="submit"><a href="{{ action('PostsController@store') }}">Create Post</a></input>
		
		{!! $inputs = request->all(); !!}
		<input type="text" name="name" value="{{ old('title') }}">
		<input type="text" name="name" value="{{ old('url') }}">
		<input type="text" name="name" value="{{ old('content') }}">
	</form>

@stop