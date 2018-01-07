<?php 
	session_start();
	$_SESSION["user_email"] = $_POST["email"];
	$_SESSION["user_passwd"] = $_POST["passwd"];
	
	require "mysql.php";
	$query = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $_POST["email"] . "'");
	
	$rows = $query->fetch_assoc();
	
	$_SESSION["user_ruolo"] = $rows["RUOLO"];
	
	header("Location: home.php");
 ?>