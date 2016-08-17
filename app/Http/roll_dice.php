<?php
	if ($roll == $guess) {
			echo 'You guesed correctly!';
		} else {
			echo 'Try again!';
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>guess: <?= $guess ?></h1> 
	<h1>roll: <?= $roll ?></h1>
</body>
</html>