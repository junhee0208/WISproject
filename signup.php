<?php
	include_once 'header.php'
	echo "<h1>Sign Up: this is recent file!!</h1>"
?>


<section class="signup-form">
	<h2>Sign up</h2>
	<div class="signup-form">
		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="name" placeholder="Full name..."><br/><br/>
			<input type="text" name="email" placeholder="Email..."><br/><br/>
			<input type="text" name="uid" placeholder="Username..."><br/><br/>
			<input type="password" name="pwd" placeholder="Password..."><br/><br/>
			<input type="password" name="pwdrepeat" placeholder="Repeat Password..."><br/><br/>
			<button type="submit" name="submit">Sign Up</button><br/><br/>
		</form>
	</div>

	<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="emptyinput"){
				echo "<p>Fill in all fields! </p>";
			}
			else if($_GET["error"]=="invaliduid"){
				echo "<p>Choose proper username! </p>";
			}
			else if($_GET["error"]=="emptyinput"){
				echo "<p>Choose proper email!</p>";
			}
			else if($_GET["error"]=="invalidemail"){
				echo "<p>Password doesn't match! </p>";
			}
			else if($_GET["error"]=="passwordnotmatch"){
				echo "<p>Password doesn't match! </p>";
			}
			else if($_GET["error"]=="usernametaken"){
				echo "<p>User name already taken </p>";
			}
			else if($_GET["error"]=="stmtfailed"){
				echo "<p>Something went wrong, try again! </p>";
			}

			else if($_GET["error"]=="none"){
				echo "<p>You have signed up! </p>";
			}
		}
	?>
</section>



<?php
	include_once 'footer.php'
?>