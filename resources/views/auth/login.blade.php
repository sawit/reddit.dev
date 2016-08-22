@extends('layouts.master')
@section('content')
  <form method="post" action="{{ action('Auth\AuthController@postLogin') }}">
    {{ csrf_field() }}
    <div class= "form-group">
        <label for="username">Username</label>
        <input
          type="text"
          class="form-control"
          name="username"
          id="username">
          @include('forms.errors', ['field' => 'username'])
    </div>
    <div class= "form-group">
        <label for="password">Password</label>
        <input
          type="password"
          class="form-control"
          name="password"
          id="password">
          @include('forms.errors', ['field' => 'password'])
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

@stop
