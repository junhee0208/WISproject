<?php


$serverName = "fdb27.biz.nf";
$dbUsername = "3808282_junhee";
$dbPassword = "A5VDP(Km85/V+xy}";
$dbName = "3808282_junhee";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}



