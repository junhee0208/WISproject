<?php
	session_start();
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'/>";
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>WIS Website</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto">
	
</head>
<body>

	<nav>
		<div class="wrapper">
		 <a href="index.php"><img src="properties/wisLogo.png" style="width:200px; margin-right:50%" alt="logo"></a>
		 <ul id="horizontal-list" style="List-style-type:none">
			<li><a href="index.php">Home</a></li>

			<?php
				if(isset($_SESSION["userid"]))
				{
					echo "<li><a href='index.php'>Home</a></li>";
					echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
				}
				else
				{
					echo "<li><a href='signup.php'>Sign up</a></li>";
					echo "<li><a href='login.php'>Login</a></li>";
				}
			?>
		 </ul>
		</div>
	</nav>
