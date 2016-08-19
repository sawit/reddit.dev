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