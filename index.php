<?php

session_start();

if (isset($_SESSION["user_email"])) {

    header("location: home.php"); //logged

}   else {

    header("location: login.php"); //not logged

}

?>