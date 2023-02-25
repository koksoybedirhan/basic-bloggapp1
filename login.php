<?php

    require "libs/vars.php";
    require "libs/ayar.php";
    require "libs/functions.php";

    if(isLoggedin()) {
        header("location: profile.php");
        exit;
    }

    $username =  $password = "";
    $usernameerr = $passworderr = $loginerr= "";

    if (isset($_POST["login"])) {

        if(empty(trim($_POST["username"]))) {
            $usernameerr = "Kullanıcı adı girmelisiniz.";
        } else {
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"]))) {
            $passworderr = "Parola girmelisiniz.";
        } else {
            $password = trim($_POST["password"]);
        }

        if(empty($username_err) && empty($password_err)) {
            $sql = "SELECT username, password FROM uyeler WHERE username = ?";

            if($durum = mysqli_prepare($baglanti, $sql)) {

                $uparam = $username;
                
                mysqli_stmt_bind_param($durum, "s", $uparam);

                if(mysqli_stmt_execute($durum)) {
                    mysqli_stmt_store_result($durum);

                    if(mysqli_stmt_num_rows($durum) == 1) {
                        mysqli_stmt_bind_result($durum,$username,$password);
                        if(mysqli_stmt_fetch($durum)) 
                        {            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;

                            header("location: profile.php");
                        } 
                    } else {
                        $loginerr = "Yanlış kullanıcı adı girdiniz.";
                    }
                } else {
                    $loginerr = "Bİlinmeyen bir hata oluştu.";
                }
                mysqli_stmt_close($durum);
            }
        }

        mysqli_close($baglanti);
    }

?>

<?php include "parts/header.php"?>
<div class="container my-4">
    <?php include "parts/navbar.php"; ?>
    <br>

    <?php
    if(!empty($loginerr)) {
        echo '<div class="alert alert-danger">'.$loginerr.'</div>';
    }
    ?>

    <div class="row">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($usernameerr)) ? 'is-invalid': ''?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $usernameerr ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Parola</label>
                                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($passworderr)) ? 'is-invalid': ''?>" value="<?php echo $password; ?>">
                                <span class="invalid-feedback"><?php echo $passworderr ?></span>
                            </div>

                            <input type="submit" name="login" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="img/login.jpeg">
            </div>
        </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>