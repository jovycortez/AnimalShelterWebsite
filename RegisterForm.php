<!-- Signup form -->
<!--
To get to signup form:
Click Post (if not a user.)
Click Login, then click create account.

Fields:
Username
Password
Email Address
First Name
Last Name
Zip code 

-->
<!DOCTYPE html>
<html>
<html lang = "en">
	<div>
		<head>
			<title>Sign Up</title>
			<link rel="stylesheet" type="text/css" href="layout.css" />
		</head>
	</div>
 
		<body>
		<?php
		include ("navbar.php");
		?>
		<div class="wrapper">
		
		<?php

			// Display message if uusername or email is already taken
			if (isSet($_GET["register"]) && $_GET["register"] == "usernametaken") {
				print "<p class=\"warning\"><strong>That username has already been used, please choose another one.</strong></p>";
			} else if (isSet($_GET["register"]) && $_GET["register"] == "emailtaken") {
				print "<p class=\"warning\"><strong>That email has already been used, please use another one.</strong></p>";
			}
		?>
		
		
		<form action="Register.php" method ="post">
			<form>
			 <a href="login.php"> Already have an account? Login here.</a>
				<h2> Welcome </h2>
					<table>
						<table width="500px"> 
						 <tr>
						<td>
							<label for="username">Username</label>
						</td>
						<td>
							
							<input type="text" name="username" maxlength="100" size="30" required>
						</td>
						</tr>
						<tr>
						<td>
							<label for="password">Password</label>
						</td>
						<td>
							<input type="password" name="password" maxlength="30" size="30" required>
						</td>
						</tr>
						<tr>
						<td>
							<label for="email">Email Address</label>
						</td>
						<td>
							<input type="text" name="email" maxlength="100" size="30" required>
						</td>
						</tr>
						<tr>
						<td>
							<label for="firstName">First Name</label>
						</td>
						<td>
							<input type="text" name="firstName" maxlength="100" size="30"  required>
						</td>
						</tr>
						<tr>
						<td>
							<label for="lastName">Last Name</label>
						</td>
						<td>
							<input type="text" name="lastName" maxlength="100" size="30" required>
						</td>
						</tr>
						<tr>
						<td>
							<label for="zip">Zip Code</label>
						</td>
						<td>
							<input type="text" name="zip" maxlength="100" size="30" required>
						</td>
						</tr>
						<tr>
						<td>
						<input type="submit" value="Submit"/>
						</tr>
						</td>
						
					</table> 
			</fieldset>
			</form>
			
		</div>
		
		<?php
			include ('footer.php');
		?>

	</body>	
</html>