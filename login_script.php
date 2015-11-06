<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php
	
		include('kozycorner.dbconfig.inc');
		
		session_start();
	
		// Get form values
		$user = $_POST["username"];
		$pass = $_POST["password"];
		
		// Connect to MySQL
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		if (mysqli_connect_errno()) {
			 print "Connect failed: " . mysqli_connect_error();
			 exit;
		}
		
		// Build query
		$query = "SELECT user_id, username, password FROM USERS
				  WHERE username='$user' && password='$pass';";
		
		// Run query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the query could not be executed" . mysqli_error($conn);
			exit;
		}
		
		// If 1 row returned, the account is valid
		$num_rows = mysqli_num_rows($result);
		if ($num_rows == 1) {
			
			// Create a $_SESSION using primary key
			// This will be used on account page to lookup users posts
			$row = mysqli_fetch_assoc($result);
			$_SESSION["user_id"] = $row["user_id"];
			
			print "<p>You are now logged in.</p>";
			
		} else {
			print "The username or password was invalid.";
		}
				
	?>
</body>
</html>