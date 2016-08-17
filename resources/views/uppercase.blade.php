@extends('layouts.master')
@section('content')
	<h1>{{$word}}>!</h1>
	<p>
		<a href="{{ action('HomeController@uppercase', 'Kings') }}">Uppercase</a>
	</p>
;
@stop