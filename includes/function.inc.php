<?php

function EmptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat)
{
	$result;

	if( empty($name) || empty($email) || empty($userName) ||empty($pwd) ||empty($pwdRepeat))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}


function ValidUserId($userName)
{
	$result;
	if( !preg_match("/^[a-zA-Z0-9]*$/", $userName))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function ValidEmail($email){

	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function PwdMatch($pwd, $pwdRepeat)
{
	$result;
	if($pwd !== $pwdRepeat)
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function UserIdExist($conn, $userName)
{
	$sql = "SELECT * FROM users WHERE userUid = ?;";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			// if (headers_sent()) {
			// 	die("Redirect failed. Please click on this link: <a href=...>");
			// }
			// else{
			// 	exit(header("location: ../signup.php?error=stmtfailed"));
			// }
			//header("location: ../signup.php?error=stmtfailed");
			$msg = "stmtfailed";
			echo("<script>location.href = '../signup.php?msg=$msg';</script>");
			exit();
		}
	
		mysqli_stmt_bind_param($stmt, "s", $userName);
		mysqli_stmt_execute($stmt);
	
		$resultData = mysqli_stmt_get_result($stmt);
	
		if($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else{
			$result = false;
			return $result;
		}
	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
	

	mysqli_stmt_close($stmt);
}


function CreateUser($conn, $name, $email, $userName, $pwd)
{
	$sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}
	
	
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
		mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: ../login.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
	
}

function EmptyInputLogin($userName, $pwd)
{
	$result;

	if(empty($userName) ||empty($pwd))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function LoginUser($conn, $userName, $pwd)
{
	$uidExist = UserIdExist($conn, $userName);

	//Check the id that user has input exists in CB	
	if ($uidExist === false){
		header("location: ../login.php?error=wrongId");
		exit();
	}

	$pwdHashed = $uidExist["userPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if($checkPwd === false){
		header("location: ../login.php?error=wrongPassword");
		exit();
	}
	else if($checkPwd === true){
		//session!!
		session_start();
		$_SESSION["userid"] = $uidExist["userId"];
		$_SESSION["useruid"] = $uidExist["userUid"];
		header("location: ../index.php");
		exit();

	}
}
?>