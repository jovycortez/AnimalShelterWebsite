<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Form </title>
		<meta charset = "utf-8" />
	</head>
	<body>
	<?php

		// Connect to MySQL

		$db = @mysql_connect("localhost", "root", "");
		if (mysqli_connect_errno()) {
			print "Connection failed: " . mysqli_connect_error();
			exit();
		}
		
		$select_db = mysql_select_db("mydb");
		if(!$select_db){
				print "Error - Could not select the database";
				exit();
		}

		// Get the tblLookup and clean it up (delete leading and trailing 
		// whitespace and remove backslashes from magic_quotes_gpc)

		$p_name = $_POST['petname'];
		$p_type = $_POST['type'];
		$breed = $_POST['breed'];
		$color = $_POST['color'];
		$weight = $_POST['weight'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zipcode'];
		$date = $_POST['date'];
		$mix_b = $_POST['mixbreed'];

		
		$result = mysql_query('INSERT INTO pets (pet_name, pet_type, gender, color, weight, address, city, state, zipcode, pet_description, is_mixed) 
		VALUES($p_name , $p_type, $gender, $color, $weight, $address, $city, $state, $zip, 1111-11-11, pet_description, $mixbreed)');
		if (!$result) {
			print "Error - the query could not be executed";
				mysql_error();
			exit;	
		}else{
			print "The deed is done";
		}

		?>
	</body>
	</head>
</html>