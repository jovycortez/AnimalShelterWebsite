<?php

	include('kozycorner.dbconfig.inc');

	// Get form values
	$user = $_POST["username"];
	$pass = $_POST["password"];
	
	// Connect to MySQL
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
	// Build query.
	$query = "SELECT user_id, username, password FROM users
			  WHERE username='$user' && password='$pass';";
	
	// Run query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the query could not be executed: " . mysqli_error($conn);
		exit;
	}
	
	// If 1 row returned, the account is valid
	$num_rows = mysqli_num_rows($result);
	if ($num_rows == 1) {
		
		// Get the row of data
		$row = mysqli_fetch_assoc($result);
		
		// Create a cookie and store the user's primary key in it
		// Other pages will use this value to identify the user
		$cookie_name = "user_id";
		$cookie_value = $row["user_id"];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
		
		// Successful login, redirect to homepage
		header( 'Location: index.php' );
		
	} else {
		
		// Unsuccessful login, redirect to login page
		header( 'Location: login.php?login=retry' );
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8" />
</head>
<body>

</body>
</html>