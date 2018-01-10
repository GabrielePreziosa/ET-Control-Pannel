<?php

require "mysql.php";

function getRuolo($email) {

    $execute = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $_POST["email"] . "'");
    
    $data = $execute->fetch_assoc();

    return $data["RUOLO"];

}

?>