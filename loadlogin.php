<?php 
	session_start();
	require "mysql.php";
	
	if (isset($_POST["email"]) && isset($_POST["passwd"]) ) {
	
		$checkemail = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $_POST["email"] . "'");
	
		if ($checkemail->num_rows > 0) {
	
			$checkpass = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $_POST["email"] . "' AND PASSWORD = '" . md5($_POST["passwd"]) . "'");
	
			if ($checkpass->num_rows > 0) {
	
				$userdata = $checkpass->fetch_assoc();
	
				//save userdata in session variables
				$_SESSION["user_email"] = $userdata["EMAIL"];
				$_SESSION["user_name"] = $userdata["COGNOME"] . " " . $userdata["NOME"];
				
				$IPSql = "UPDATE users SET LASTIP='$_SERVER[REMOTE_ADDR]' WHERE EMAIL LIKE '$_SESSION[user_email]'";
				$mysqli->query($IPSql);
				
				
				header("location: index.php");
	
			}   else {
				
				header("location: index.php");
	
			}
	
		}   else {
				
			header("location: index.php");
	
		}
	
	}	else {

		 echo "Suck";

	}

 ?>