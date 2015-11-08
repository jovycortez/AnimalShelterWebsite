<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rescued pets</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
		<?php
			include ('navbar.php');
		?>
		
		<div class="wrapper">
			<?php
				$section = "rescued";
				include ('list.php');
			?>
		</div>
</body>
</html>