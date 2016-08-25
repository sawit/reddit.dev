<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ action('HomeController@showWelcome') }}">SawIt</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{ action('HomeController@showWelcome') }}">Home</a></li>
          <li><a href="{{ action('PostsController@index') }}">Posts</a></li>
          <li><a href="{{ action('PostsController@create') }}">Create Post</a></li>
          <li><a href="/auth/register">Sign Up</a></li>
          <li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
        </ul>

        <form method="GET" action="{{ action('PostsController@index') }}" class="navbar-form navbar-left">
          <div class="form-group">
            <input name="keyword" type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" id="search" class="btn btn-default">Search</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/account">Profile</a></li>
              <li><a href="/posts">View Posts</a></li>
              <li><a href="/posts/create">Create Post</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/auth/logout" action="Auth\AuthController@getLogout">Logout</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>

    @if (session()->has('message'))
    	<div class="alert alert-success">{{ session('message') }}</div>
    @elseif (session()->has('message'))
    	<div class="alert alert-danger">{{ session('message') }}</div>
	@endif

    @yield('content')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	$('.post-delete-link')on('click', function(e) {
    		e.preventDefault();
    		var action= $(this).attr('href');
    		$(#post-delete-form)attr('action', action);
    		$(#post-delete-form).submit();
    	})
    </script>
</body>
</html>
