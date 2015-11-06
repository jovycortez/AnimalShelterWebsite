<!DOCTYPE html>
<html lang="en">
<head>
	<title>Logout</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php
	
		session_start();		
		session_destroy();
		
		print "<p>You have been logged out.</p>";
				
	?>
</body>
</html>