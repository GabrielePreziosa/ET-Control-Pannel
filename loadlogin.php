<?php 
	session_start();
	require "mysql.php";
	
	if (isset($_POST["email"]) && isset($_POST["passwd"]) ) {
	
		$checkemail = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");
	
		if ($checkemail->num_rows > 0) {
	
			$checkpass = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "' AND PASSWORD = '" . md5($passwd) . "'");
	
			if ($checkpass->num_rows > 0) {
	
				$userdata = $checkpass->fetch_assoc();
	
				//save userdata in session variables
				$_SESSION["user_email"] = $rows["EMAIL"];
				$_SESSION["user_ruolo"] = $rows["RUOLO"];
				$_SESSION["user_name"] = $rows["COGNOME"] . " " . $rows["NOME"];
				
				header("location: home.php");
	
			}   else {
				
				header("location: index.php");
	
			}
	
		}   else {
				
			header("location: index.php");
	
		}
	
	}

 ?>