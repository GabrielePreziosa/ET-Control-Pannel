<?php

require "mysql.php";

$email = $_REQUEST["email"];
$passwd = $_REQUEST["passwd"];

if ($email != "" && $passwd != "") {

    $checkemail = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");

    if ($checkemail->num_rows > 0) {

        $checkpass = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "' AND PASSWORD = '" . md5($passwd) . "'");

        if ($checkpass->num_rows > 0) {

            $userdata = $checkpass->fetch_assoc();

            echo "success-" . $userdata["NOME"] . "-" . $userdata["COGNOME"];

        }   else {

            echo "incorrect_passwd";

        }

    }   else {

        echo "not_registered";

    }

}

?>