<?php
require "config.php"; //crendentials are stored here

/*CONNECT TO DB*/
$mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbdatabase);
if ($mysqli->connect_error) {
    die('Errore di connessione a mysql:' . $mysqli->connect_errno . " " . $mysqli->connect_error);
}

/*DEFAULT TABLE*/
$mysqli->query("CREATE TABLE IF NOT EXISTS users (EMAIL VARCHAR(40), PASSWORD VARCHAR(50), NOME VARCHAR(20), COGNOME VARCHAR(20), RUOLO VARCHAR(15), LASTIP VARCHAR(15))");

$mysqli->query("CREATE TABLE `commissioni` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `EMAIL_CLIENTE` varchar(40) NOT NULL,
 `EMAIL_TECNICO` varchar(40) NOT NULL,
 `CATEGORIA` varchar(20) NOT NULL,
 `SERVIZIO` varchar(512) NOT NULL,
 `DESCRIZIONE` longtext NOT NULL,
 `NOTE` longtext NOT NULL,
 `BUDGET` varchar(7) NOT NULL,
 `DATA_INIZIO` varchar(10) NOT NULL,
 `DATA_FINE` varchar(10) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");

?>