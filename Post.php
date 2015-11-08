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

		$pname = $_POST['petname'];
		$ptype = $_POST['type'];
		$breed = $_POST['breed'];
		$color = $_POST['color'];
		$weight = $_POST['weight'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zipcode'];
		$date = $_POST['date'];
		$mixb = $_POST['mixbreed'];
		$description = $_POST['description'];
		
		if($pname == null){
			$pname == '';
		}
		if($weight == null){
			$weight == '';
		}
		if($address == null){
			$address == '';
		}
		if(strcmp($mixb, "TRUE") == 0){
			$mixb = TRUE;
		}else{
			$mixb = FALSE;
		}
		echo $ptype;
		$query = "INSERT INTO PETS (pet_name, pet_type, color, weight, gender, address, city, state, zipcode, date_found, is_mixed, pet_description)
			VALUES('$pname', '$ptype', '$color', '$weight', '$gender', '$address', '$city', '$state', '$zip', '$date', '$mixb', '$description')";
		$result = mysql_query($query);
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