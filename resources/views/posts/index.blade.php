@extends('layouts.master')
@section('content')
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<!-- <th>Votes</th> -->
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
							<!-- <td>{{ $post->vote_score }}</td> -->
							<td>{{ $post->title }}</td>
							<td><a href="http://{{ $post->url }}" target="_Blank">{{ $post->url }}</a></td>
							<td>{{ $post->content }}</td>
							<td>{{ $post->created_at }}</td>
							<td>{{ $post->user->name }}</td>
							<td>

							<form method="GET" action="{{ action('PostsController@show', $post->id) }}">
							{!! method_field('SHOW') !!}
							{!! csrf_field() !!}
							<button type="submit" value="show" class="btn btn-primary">View</button></form>

							@if($post->createdBy(Auth::user()))
							<a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-info">Edit</a>
						
							<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
							{!! method_field('DELETE') !!}
							{!! csrf_field() !!}
							<button type="submit" value="Delete" class="btn btn-danger">Delete</button></form>

							@endif
							</td>
						</tr>
					@endforeach
		</tbody>
	</table>
			@if(isset($searchQuery) && !is_null($searchQuery))
				{!! $posts->appends(['search' => $searchQuery])->render() !!}
			@endif
			{!! $posts->render() !!}
@stop
