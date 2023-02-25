<?php
    include "libs/functions.php";
    include "libs/vars.php";

    session_start();

    $_SESSION = array();

    session_destroy();

    header('Location: login.php');

    exit;
?>