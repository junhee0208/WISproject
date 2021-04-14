<?php
	include_once 'header.php'
?>

<link rel="stylesheet" type="text/css" href="css/style.css"/>

<div class="wrapper" style="margin-left:auto; margin-right:auto">
<section class="login-form">
	<h2>Log in</h2>
	<div class="login-form">
		<form action="includes/login.inc.php" method="post">
			
			<input type="text" name="uid" placeholder="Username..."><br/><br>
			<input type="password" name="pwd" placeholder="Password..."><br/><br>
			
			<button type="submit" name="submit">Log In</button><br/><br>
		</form>
	</div>
	<?php
	if(isset($_GET["error"])){
			if($_GET["error"]=="emptyinput"){
				echo "<p>Fill in all fields! </p>";
			}
			else if($_GET["error"]=="wrongId"){
				echo "<p>Incorrect login information! </p>";
			}
			else if($_GET["error"]=="wrongPassword"){
				echo "<p>Incorrect login information! </p>";
			}
			else if($_GET["error"]=="none"){
				echo "<p>You have signed up! </p>";
			}
		}
	?>
</section>
</div>

<?php
	include_once 'footer.php'
?>