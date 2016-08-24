@extends('layouts.master')
@section('content')
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Votes</th>
				<th>Title</th>
				<th>URL</th>
				<th>Content</th>
				<th>Posted</th>
				<th>Posted By</th>
				<th>Actions</th>

			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
				<tr>
					<td></td>
					<td>{{ $post->title }}</td>
					<td><a href="http://{{ $post->url }}" target="_Blank">{{ $post->url }}</a></td>
					<td>{{ $post->content }}</td>
					<td>{{ $post->created_at }}</td>
					<td>{{ $post->user->name }}</td>
					<td><form method="POST" action="{{ action('PostsController@edit', $post->id) }}">
						{!! method_field('EDIT') !!}
						{!! csrf_field() !!}
					<button type="submit" value="Edit" class="btn btn-primary">Edit</button></form>
					<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
						{!! method_field('DELETE') !!}
						{!! csrf_field() !!}
						<button type="submit" value="Delete" class="btn btn-danger">Delete</button></form></td>
				</tr>
			@endforeach
		</tbody>
	</table>

			{!! $posts->render() !!}
@stop
