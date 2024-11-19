<?php
 session_start();

 if (isset($_SESSION['userLogged'])) {

    session_start();
    session_destroy();

    header("Location: index.php");
    exit();

 } else {

    header("Location: index.php");
    exit();
 }
?>