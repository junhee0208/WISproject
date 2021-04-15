<?php 

if(isset($_POST["submit"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$userName = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(EmptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if(ValidUserId($userName) !== false){
		header("location: ../signup.php?error=invaliduid");
		exit();
	}

	if(ValidEmail($email) !== false){
		header("location: ../signup.php?error=invalidemail");
		exit();
	}

	if(PwdMatch($pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=passwordnotmatch");
		exit();
	}

	if(UserIdExist($conn, $userName) !== false){
		header("location: ../signup.php?error=usernametaken");
		exit();
	}


	CreateUser($conn, $name, $email, $userName, $pwd);
}
else{
	header("location: ../signup.php");
	exit();
}