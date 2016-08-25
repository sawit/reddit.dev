@extends('layouts.master')
@section('content')
<form class="form-horizontal" method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
<fieldset>
{{ csrf_field() }}
<!-- Form Name -->
<legend>Sign Up For Free Account</legend>

    <div class="form-group">
      <label class="col-md-4 control-label" for="Company Name">Name</label>
      <div class="col-md-6">
      <input id="name" value="{{ old('name') }}" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="Address">Email</label>
      <div class="col-md-6">
      <input id="email" value="{{ old('email') }}" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="Password">Password</label>
      <div class="col-md-6">
        <input id="Password" value="{{ old('password') }}" type="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="Password Again">Confirm Password</label>
        <div class="col-md-6">
          <input id="Password Again" name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
      <div class="col-md-4">
        <button id="" name="" class="btn btn-success">Sign Up</button>
      </div>
    </div>

    @if ($errors->has('name'))
      {!! $errors->first('name', '<span class="help-block bg-danger">:message</span>') !!}
    @endif
    @if ($errors->has('email'))
      {!! $errors->first('email', '<span class="help-block bg-danger">:message</span>') !!}
    @endif
    @if ($errors->has('password'))
      {!! $errors->first('password', '<span class="help-block bg-danger">:message</span>') !!}
    @endif

</fieldset>
</form>

@stop
