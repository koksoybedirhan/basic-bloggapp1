<?php
    include "libs/vars.php";
    include "libs/functions.php";

    $id = $_GET["id"];

    if (deleteUser($id)) {
        $_SESSION['message'] = $id." id numaralı blog silindi.";
        $_SESSION['type'] = "danger";
    
        header('Location: users.php');
    } else {
        echo "hata";
    } 
?>
