<?php

    require "libs/vars.php";
    require "libs/functions.php";  
    
    if(!isLoggedin()) {
        header("location: login.php");
        exit;
    }

?>

<?php include "parts/header.php" ?>
<div class="container my-4">
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="row">
        <div class="col-12">
    
           <h3>Merhaba: <?php echo htmlspecialchars($_SESSION["username"])?></h3>
           <div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
           </div>

        </div>    
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>