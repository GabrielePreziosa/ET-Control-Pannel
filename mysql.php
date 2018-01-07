<?php
require "config.php"; //crendential are stored here

/*CONNECT TO DB*/
$mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbdatabase);
if ($mysqli->connect_error) {
    die('Errore di connessione a mysql (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}

/*DEFAULT TABLE*/
$mysqli->query("CREATE TABLE IF NOT EXISTS users (EMAIL VARCHAR(40), PASSWORD VARCHAR(50), NOME VARCHAR(20), COGNOME VARCHAR(20), RUOLO VARCHAR(10), LASTIP VARCHAR(15))");

?>