<html>

<head>

</head>
<body>
	<div id="social_media">
	<a id="faceb" href="http://www.facebook.com" style="height: 100px; width: 100px;"><img src="images/faceb.jpg" class="icons"></img></a>
	<a id="twitter" href="https://twitter.com/"><img src="images/twitter.jpg" class="icons"></img></a>
	</div>
	
<script language="JavaScript"> 
var i = 0;
var path = new Array();
 
path[0] = "images/slideImg1.jpg";
path[1] = "images/slideImg2.jpg";
path[2] = "images/slideImg3.jpg";

function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1)
   {
      i++;
   }
   else
   {
      i = 0;
   }
   setTimeout("swapImage()", 3000);
}
window.onload=swapImage;
</script> 

	<div id="banner">
		<img id="slideImg1" src="slideImg1.jpg" width="100%" name="slide">
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
				print "<li class=\"account\"><a href=\"account.php\">My Account</a></li>";
				print "<li class=\"account\"><a href=\"logout.php\">Logout</a></li>";
			} else {
				print "<li class=\"account\"><a href=\"login.php\">Login</a></li>";
				print "<li class=\"account\"><a href=\"registerform.php\">Register</a></li>";
			}
		?>	
	</ul>
	</div>
	</div>
	
</body>
</html>	