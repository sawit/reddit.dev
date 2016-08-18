@extends('layouts.master')
@section('content')
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>URL</th>
				<th>Content<th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>{{ $post->url }}</td>
					<td>{{ $post->content }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop