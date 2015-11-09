	<div id="banner">
		KozyCorner
	</div>
	
	<div>
    <img id="pets_image" src="images/AnimalCareBanner.jpg" width="1138" height="150">
	</div>
	
	<div id="navbar">
	<div class="wrapper">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="lost.php">Lost Pets</a></li>
		<li><a href="found.php">Found Pets</a></li>
		<li><a href="rescued.php">Adopt a Pet</a></li>
		<li><a href="postform.php">Report</a></li>
		<li><a href="faq.php">FAQ</a></li>
		<?php
			if (isSet($_COOKIE["user_id"])) {
				print "<li class=\"test\"><a href=\"logout.php\">Logout</a></li>";
			} else {
				print "<li class=\"test\"><a href=\"login.php\">Login</a></li>";
				print "<li class=\"test\"><a href=\"signup.php\">Register</a></li>";
			}
		?>
	</ul>
	</div>
	</div>