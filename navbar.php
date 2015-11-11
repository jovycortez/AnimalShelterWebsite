
	<div id="social_media">
	<a id="faceb" href="http://www.facebook.com" style="height: 100px; width: 100px;"> <img src="images/faceb.jpg" class="icons"> </img> </a>
	<a id="twitter" href="https://twitter.com/"> <img src="images/twitter.jpg" class="icons"> </img> </a>
	</div>
	
	<div id="banner">
		<img id="pets_image" src="images/AnimalCareBanner.jpg" width="100%">
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
		<li><a href="searchform.php">Search</a></li>
		<?php
			if (isSet($_COOKIE["user_id"])) {
				print "<li class=\"account\"><a href=\"myaccount.php\">My Account</a></li>";
				print "<li class=\"account\"><a href=\"logout.php\">Logout</a></li>";
			} else {
				print "<li class=\"account\"><a href=\"login.php\">Login</a></li>";
				print "<li class=\"account\"><a href=\"Signup_Form.php\">Register</a></li>";
			}
		?>	
	</ul>
	</div>
	</div>