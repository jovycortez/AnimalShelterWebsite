<!DOCTYPE html>
<html lang="en">
<head>
	<title>Found pets</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css\layout.css" />
</head>
<body>
		<?php
			include ('navbar.php');
		?>
		
		<div class="wrapper">
			<?php
				$section = "found";
				include ('list.php');
			?>	
		</div>
</body>
</html>