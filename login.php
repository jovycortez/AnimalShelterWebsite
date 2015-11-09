<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
	
	<?php
		include ('navbar.php');
	?>
	
	<div class="wrapper">
		<form action="login_script.php" method="post">
			<table border="0">
				<tr>
				<td>Username</td>
				<td><input type="text" name="username" size="25" /></td>
				</tr>
				
				<tr>
				<td>Password</td>
				<td><input type="password" name="password" size="25" /></td>
				</tr>
				
				<tr>
				<td colspan="2"><input type="submit" value="Login" /></td>
				</tr>

				<tr>
				<td colspan="2"><a href="signup.php">Not Registered yet? Sign up here</a></td>
				</tr>
			</table>
		</form>
		
		<?php

			// Display message if user already tried logging in
			if (isSet($_GET["login"]) && $_GET["login"] == "retry") {
				print "<p><strong>The username or password was invalid, please try again.</strong></p>";
			} else if (isSet($_GET["login"]) && $_GET["login"] == "post") {
				print "<p><strong>You must login to make a post.</strong></p>";
			}
		?>
	</div>
	
	<?php
		include ('footer.php');
	?>
		
</body>
</html>