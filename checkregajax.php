<?php

require "mysql.php";

$email = $_REQUEST["email"];

if ($email != "") {

    $checkemail = $mysqli->query("SELECT * FROM users WHERE EMAIL = '" . $email . "'");

    if ($checkemail->num_rows > 0) {

        echo "registered";

    }   else {

        echo "go";

    }

}

?>