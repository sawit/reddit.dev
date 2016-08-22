@extends('layouts.master')
@section('content')
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
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
					<td>{{ $post->title }}</td>
					<td>{{ $post->url }}</td>
					<td>{{ $post->content }}</td>
					<td>{{ $post->created_at->setTimezone('America/Chicago')->format('F j, Y h:i A') }}</td>
					<td>{{ $post->user->name }}</td>
					<td><form method="POST" action="{{action('PostsController@destroy', $post->id) }}">
						{!! method_field('DELETE') !!}
						{!! csrf_field() !!}
						<button type="submit" value="Delete" class="btn btn-danger">Delete</button></form>
						<button type="submit" value="Edit" class="btn btn-primary">Edit</td>
				</tr>
			@endforeach
		</tbody>
	</table>
			
			{!! $posts->render() !!}
@stop