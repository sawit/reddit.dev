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
        <a class="navbar-brand" href="">SawIt</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="/posts">Posts</a></li>
          <li><a href="/signup">Sign Up</a></li>
          <li><a href="/auth/login">Login</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
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
