<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    @extends('layouts.master')
    @extends('directory.view-name')
	@section('content')
    	<h1>Hello, <?php echo $name; ?>!</h1>
	@stop
</body>
</html>