<?php
	include_once 'header.php'
?>




<section> 
	<h1>This is Home Page</h1>

	<?php
		if(isset($_SESSION["userid"]))
		{
			echo "<p>Welcome " .$_SESSION["userid"]. "</p>";
			echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
		}
		else
		{
			echo "<li><a href='index.php'>Sign up</a></li>";
			echo "<li><a href='index.php'>Login</a></li>";
		}
	?>
</section>


<?php
	include_once 'footer.php'
?>