<!--Signup php-->
<?php
	include('kozycorner.dbconfig.inc');
				
	// Connect to MySQL	
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connection failed: " . mysqli_connect_error();
		 exit;
	}

	//Set variables for user
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$firstName= $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$zip = $_POST['zip'];
	/* $phone = $_POST['phone']; */



	//Checks if username exists
	$query = "SELECT * FROM users
			  WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the breed search query could not be executed: " . mysqli_error($conn);
		exit;
	}

	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) {
		//If username exists, redirect back to registration page
		header( 'Location: RegisterForm.php?register=usernametaken' );
		exit;
	}
	
	
	
	//Checks if email exists
	$query = "SELECT * FROM users
			  WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the breed search query could not be executed: " . mysqli_error($conn);
		exit;
	}

	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) {
		//If password exists, redirect back to registration page
		header( 'Location: RegisterForm.php?register=emailtaken' );
		exit;
	}



	//Inserts a new user
	$query = "INSERT INTO $dbname.users (username, password, email, first_name, last_name, zip, is_admin)
		VALUES('$username', '$password', '$email', '$firstName', '$lastName', '$zip', '0')";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the insert query could not be executed: " . mysqli_error($conn);
		exit;	
	}

	//Account has been created! Send user to login screen
	header( 'Location: login.php?login=registered' );
?>


<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Registered</title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	<body>
		<div class="wrapper">
		<h2> Thanks for signing up!</h2>
		<a href="home.php"> home </a><br/>
		<a href="PostForm.php"> Report </a>
		</div>
		
		<?php include ('footer.php'); ?>
	</body>
	
</html>