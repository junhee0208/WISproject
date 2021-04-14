<?php

if(isset($_POST["submit"])){
	$userName = $_POST["uid"];
	$pwd = $_POST["pwd"];

	require_once 'dbh.inc.php';
	require_once 'function.inc.php';

	if(EmptyInputLogin($userName, $pwd) !== false){
		header("location: ../login.php?error=emptyinput");
		exit();
	}

	LoginUser($conn, $userName, $pwd);
}
else{
	header("location: ../login.php");
	exit();
}

?>