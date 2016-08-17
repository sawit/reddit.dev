@extends('layouts.master')
@section('content')
	<h1>Number: {{$number}}></h1>
	<p>
		<a href="{{action('HomeController@increment', ['number' => 10]) }}">Increase Number
		</a>
	</p>
@stop
