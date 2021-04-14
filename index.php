<?php
	include_once 'header.php'
?>

<link rel="stylesheet" type="text/css" href="css/style.css"/>

<body id="body" style="width:100%">
<div class="wrapper" style="margin-left:auto; margin-right:auto">
	<section> 
		<h1>This is Home Page</h1>
		 
		<?php
			if(isset($_SESSION["userid"]))
			{
				echo "<p>Welcome " .$_SESSION["useruid"]. "</p><br/>";

				echo "<li style='list-style-type: none;'><a href='programs.php'>Programs Information</a></li><br/>";
				echo "<li style='list-style-type: none;'><a href='includes/logout.inc.php'>Log out</a></li>";
			}
			else
			{
				echo "<li style='list-style-type: none;'><a href='login.php'>Login</a></li><br/>";
				echo "<li style='list-style-type: none;'><a href='signup.php'>Sign up</a></li>";
			}
		?>
	</section>

</div>
</body>
<?php
	include_once 'footer.php'
?>