@extends('layouts.master')
@section('content')
  <form method="post" action="{{ action('Auth\AuthController@postLogin') }}">
    {{ csrf_field() }}
    <div class= "form-group">
        <label for="email">Email</label>
        <input
          type="text"
          class="form-control"
          name="email"
          id="email">
          <!-- @include('forms.errors', ['field' => 'email']) -->
          @if ($errors->has('email'))
     				{!! $errors->first('email', '<span class="help-block bg-danger">:message</span>') !!}
 			    @endif
    </div>
    <div class= "form-group">
        <label for="password">Password</label>
        <input
          type="password"
          class="form-control"
          name="password"
          id="password">
          @if ($errors->has('password'))
            {!! $errors->first('password', '<span class="help-block bg-danger">:message</span>') !!}
          @endif
    </div>
    <button type="submit" class="btn btn-info">Login</button>
  </form>

@stop
