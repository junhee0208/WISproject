<?php

function EmptyInputSignup($name, $email, $username, $pwd, $pwdrepeat)
{
	$result;

	if( empty($name) || empty($email) || empty($username) ||empty($pwd) ||empty($pwdrepeat))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}


function ValidUid($username)
{
	$result;
	if( !preg_match("/^[a-zA-Z0-9]*$/", $username))
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

function PwdMatch($pwd, $pwdrepeat)
{
	$result;
	if($pwd !== $pwdrepeat)
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function UidExist($conn, $username)
{
	$sql = "SELECT * FROM users WHERE userUid = ?;";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}
	
		mysqli_stmt_bind_param($stmt, "s", $username);
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


function CreateUser($conn, $name, $email, $username, $pwd)
{
	$sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);

	try{
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../signup.php?error=stmtfailed");
			exit();
		}
	
	
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
		mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
		header("location: ../login.php?error=none");
		exit();

	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}
	
}

function EmptyInputLogin($username, $pwd)
{
	$result;

	if(empty($username) ||empty($pwd))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function LoginUser($conn, $username, $pwd)
{
	$uidExist = UidExist($conn, $username);

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