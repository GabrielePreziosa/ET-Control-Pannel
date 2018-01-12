<?php

function getRuolo($email) {

    require "mysql.php";

    $execute = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");
    
    $data = $execute->fetch_assoc();

    return $data["RUOLO"];

}

function getCognomeNome($email) {

    require "mysql.php";

    $execute = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");
    
    $data = $execute->fetch_assoc();

    return $data["COGNOME"] . " " .$data["NOME"] ;

}

?>