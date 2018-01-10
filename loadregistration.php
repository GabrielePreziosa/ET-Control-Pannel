<?php 
	session_start();
	require "mysql.php";
	
	if (isset($_POST["email"]) && isset($_POST["passwd"]) && isset($_POST["name"]) && isset($_POST["surname"])) {
	
		$checkemail = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $_POST["email"] . "'");
	
		if ($checkemail->num_rows == 0) {
	
			$mysqli->query("INSERT INTO  users (EMAIL, PASSWORD, NOME, COGNOME, RUOLO) VALUES ('" . $_POST["email"] . "', '" . md5($_POST["passwd"]) . "', '" . $_POST["name"] . "', '" . $_POST["surname"] . "', 'Cliente')"); //registration query
	
			header("location: login.php?reg=" . $_POST["email"] . "");

		}   else {
				
			header("location: index.php");
	
		}
	
	}	else {

		 echo "Suck";

	}

 ?>