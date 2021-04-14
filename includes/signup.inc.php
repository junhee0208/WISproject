<?php 

if(isset($_POST["submit"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if(ValidUid($username) !== false){
		header("location: ../signup.php?error=invaliduid");
		exit();
	}

	if(ValidEmail($email) !== false){
		header("location: ../signup.php?error=invalidemail");
		exit();
	}

	if(PwdMatch($pwd, $pwdrepeat) !== false){
		header("location: ../signup.php?error=passwordnotmatch");
		exit();
	}

	if(UidExist($conn, $username) !== false){
		header("location: ../signup.php?error=usernametaken");
		exit();
	}


	CreateUser($conn, $name, $email, $username, $pwd);
}
else{
	header("location: ../signup.php");
	exit();
}