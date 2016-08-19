@extends('layouts.master')
@section('content')
	<dl>
		<dt>Title</dt>
		<dd>{{ $post->title }}</dd>
		<dt>Url</dt>
		<dd>{{ $post->url }}</dd>
		<dt>Content</dt>
		<dd>{{ $post->content }}</dd>
		<dt>Posted</dt>
		<dd>{{ $post->created_at }}</dd>
	</dl>
@stop