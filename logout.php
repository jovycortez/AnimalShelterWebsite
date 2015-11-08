<?php
	
	// Delete the cookie
	setcookie("user_id", "", time() - 3600);

	// Redirect to homepage
	header( 'Location: index.php' );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Logout</title>
	<meta charset="utf-8" />
</head>
<body>

</body>
</html>