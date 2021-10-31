<?php

$db_host = "";
$db_user = "";
$db_password = "";
$db_name = "";
$scriptServerName = $_SERVER["SERVER_NAME"];

if($scriptServerName == "localhost"){
	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "wap-status";
}else{
	$db_host = "localhost:3306";
	$db_user = "thewatch_zoopuser";
	$db_password = "kbOBtdJxe8cB";
	$db_name = "thewatch_zoop";
}

$con = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die("Connection was not established");

?>