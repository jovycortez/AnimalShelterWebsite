<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
		<?php
			include ('navbar.php');
		?>
		
		<div class="wrapper">
			<?php
				$section = "My Account";
				include ('UserList.php');
			?>	
		</div>
		
		<?php
			include ('footer.php');
		?>
</body>
</html>