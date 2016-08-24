@extends('layouts.master')

@section('content')
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>URL</th>
				<th>Content</th>
				<th>Posted</th>
			</tr>
		</thead>
			<tbody>
				@if ($search->count() === 0)
					<td colspan="6" class="text-center">Nothing found<td>
				@else
					@foreach ($search as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td><a href="http://{{ $post->url }}" target="_Blank">{{ $post->url }}</a></td>
							<td>{{ $post->content }}</td>
							<td>{{ $post->created_at }}</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		<tfoot>
			<tr>
				<td colspan="6" class="text-center">{!! $search->render() !!}</td>
			</tr>
		</tfoot>
	</table>
@stop
