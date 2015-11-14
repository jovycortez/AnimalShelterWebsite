<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Form </title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	<body>
	
	<?php
	include ('navbar.php');
	include('kozycorner.dbconfig.inc');
	include ('footer.php');
	
	// Connect to MySQL	
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
		//Set variables
		$id = $_GET['petid'];

		
		//Gets new pets post id
		$query = "DELETE FROM mydb.users_pets WHERE pet_id = '$id'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the delete query 1 could not be executed";
				mysql_error();
			exit;	
		}
		
		//Delete post
		$query = "DELETE FROM mydb.pets WHERE pet_id = '$id'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the delete query 2 could not be executed";
				mysql_error();
			exit;	
		}
		
		?>
		<div class="wrapper">
		<h1>Your post has been deleted!</h1>
		</div>
	</body>
	</head>
</html>