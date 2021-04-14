<?php
	session_start();
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'/>";
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>WIS Website</title>
	<link rel='stylesheet' type='text/css' href='css/style.css'/>
</head>
<body>
	<nav>
		<div class="wrapper" style ="width:80%;margin-left: auto;margin-right: auto;">
			
			<table id="tblHeader" style="width:100%"> 
				<tr>
					<td style="width:70%">
						<a href="index.php"><img src="properties/wisLogo.png" style="width:200px; margin-right:50%" alt="logo"></a>
					</td>
					<td style="width:20%">
						<ul id="horizontal-list" style="List-style-type:none">
							<!--<li style="margin-right:10%"><a href="index.php">Home</a></li>-->

							<?php
								if(isset($_SESSION["userid"]))
								{
									echo "<li style='margin-right:10%'><a href='index.php'>Home</a></li>";
									echo "<li style='margin-right:10%'><a href='includes/logout.inc.php'>Log out</a></li>";
								}
								else
								{
									echo "<li style='margin-right:10%'><a href='login.php'>Login</a></li>";
									echo "<li style='margin-right:10%'><a href='signup.php'>Sign up</a></li>";
								}
							?>
						</ul>
					</td>
				</tr>
			</table> 
			<img src="properties/student-banner.jpg" style="opacity: 0.9; width:100%; height:300px;">
		 
		</div>
	</nav>
