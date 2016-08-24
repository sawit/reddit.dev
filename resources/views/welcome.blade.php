@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<div class="container">
@foreach($posts as $post)
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img class="media-object" src="http://placekitten.com/150/150">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">{{ $post->title }}</h4>
          <p class="text-right">{{ $post->created_by }}</p>
          <p>{{ $post->url }}</p>
          <p>{{ $post->content }}</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> {{ $post->created_at }} </span></li>
			</ul>
       </div>
    </div>
  </div>
  @endforeach
</div>

@stop
