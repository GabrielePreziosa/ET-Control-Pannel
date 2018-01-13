<?php

function getRuolo($email) {

    require "mysql.php";

    $execute = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");
    
    $data = $execute->fetch_assoc();

    return $data["RUOLO"];

}

function getCognomeNome($email) {

    require "mysql.php";
	$ret = "";
	
    $sql = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");
    if($sql->num_rows){
		
		$data = $sql->fetch_assoc();

		$ret = $data["COGNOME"] . " " .$data["NOME"] ;
	}else{
		$ret = "Errore";
	}
	
	return $ret;
}

function isAccept($id){
	require "mysql.php";
	$sql = $mysqli->query("SELECT * FROM commissioni WHERE id = '" . $id . "'");
    if($sql->num_rows){
		
		$row = $sql->fetch_assoc();

		if($row['ACCETTATO'] == 'Si'){
			$ret = 'Accettato';
		}else if($row['ACCETTATO'] == 'No'){
			$ret = 'Non accettato';
		}else{
			$ret = 'Errore';
		}
	}else{
		$ret = "Errore";
	}
	
	return $ret;
}

?>