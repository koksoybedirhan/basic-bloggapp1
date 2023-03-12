<?php
    include "libs/ayar.php";
    include "libs/functions.php";
    include "libs/vars.php";

    $username = $mail = $number = $password = $des = $confpassword = "";
    $usernameerr = $mailerr = $numbererr = $passworderr = $des = $confpassworderr = "";

    if (isset($_POST["register"])) {
        
        //username
        if(empty(trim($_POST["username"])))
        {
            $usernameerr = "Kullanıcı adı girmelisiniz.";
        } 
        elseif (strlen(trim($_POST["username"])) < 3 or strlen(trim($_POST["username"])) > 24) 
        {
            $usernameerr = "Kullanıcı adı 5-25 karakter arasında olmalıdır.";
        }
        else
        {
            $sql = "SELECT id FROM uyeler WHERE username = ?";

            if($durum = mysqli_prepare($baglanti, $sql)) 
            {
                $uparam = trim($_POST["username"]);
                mysqli_stmt_bind_param($durum, "s", $uparam);

                if(mysqli_stmt_execute($durum)) {
                    mysqli_stmt_store_result($durum);

                    if(mysqli_stmt_num_rows($durum) == 1) {
                        $usernameerr = "Kullanıcı adı daha önce alınmış.";
                    } else {
                        $username = $_POST["username"];
                    }
                } else {
                    echo mysqli_error($baglanti);
                    echo "Hata var.";
                }
            }

            $username = $_POST["username"];
        }

        //email
        if(empty(trim($_POST["email"])))
        {
            $mailerr = "Mail adresi girmelisiniz.";
        }
        elseif (strlen(trim($_POST["email"])) < 10 or strlen(trim($_POST["email"])) > 39) 
        {
            $mailerr = "Mail adresi 10-40 karakter arasında olmalıdır.";
        }
        else
        {
            $sql = "SELECT id FROM uyeler WHERE mail = ?";

            if($durum = mysqli_prepare($baglanti, $sql)) {
                $mparam = trim($_POST["email"]);
                mysqli_stmt_bind_param($durum, "s", $mparam);

                if(mysqli_stmt_execute($durum)) {
                    mysqli_stmt_store_result($durum);

                    if(mysqli_stmt_num_rows($durum) == 1) {
                        $mailerr = "Mail adresi daha önce alınmış.";
                    } else {
                        $mail = $_POST["email"];
                    }
                } else {
                    echo mysqli_error($baglanti);
                    echo "Hata var.";
                }
            }

            $mail = $_POST["email"];
        }

        //number
        if(empty(trim($_POST["number"])))
        {
            $numbererr = "Telefon Numarası girmelisiniz.";
        }
        elseif (strlen(trim($_POST["number"])) < 10 or strlen(trim($_POST["number"])) > 12) 
        {
            $numbererr = "Telefon Numarası başında 0 olacak şekilde tam yazılmalıdır.";
        }
        else
        {
            $number = $_POST["number"];
        }

        //description
        if(empty(trim($_POST["des"])))
        {
            $numbererr = "Kişi Özeti girmelisiniz.";
        }
        elseif (strlen(trim($_POST["des"])) < 10 or strlen(trim($_POST["des"])) > 200) 
        {
            $deserr = "Açıklama 10-200 karakter arasında olmalıdır.";
        }
        else
        {
            $des = $_POST["des"];
        }

        //password
        if(empty(trim($_POST["password"])))
        {
            $passworderr = "Parola girmelisiniz.";
        }
        elseif (strlen(trim($_POST["password"])) < 5 or strlen(trim($_POST["password"])) > 19) 
        {
            $passwordrerr = "Parola 5-20 karakter arasında olmalıdır.";
        }
        else
        {
            $password = $_POST["password"];
        }

        //confpassword
        if(empty(trim($_POST["password"])))
        {
            $confpassworderr = "Parola girmelisiniz.";
        }
        else
        {
            $confpassword = $_POST["confpassword"];
            if ($password != $confpassword)
            {
                $confpassworderr = "Parolalar eşleşmiyor";
            }
        }

        //veritabanı
        if(empty($usernameerr) && empty($mailerr) && empty($numbererr) && empty($passworderr) && empty($deserr))
        {
            $sql = "INSERT INTO uyeler (username, mail, number, password, des) VALUES (?,?,?,?,?)";
            
            if($durum = mysqli_prepare($baglanti, $sql))
            {
                $uparam = $username;
                $mparam = $mail;
                $nparam = $number;
                $pparam = $password;
                $dparam = $des;

                mysqli_stmt_bind_param($durum, "sssss", $uparam, $mparam, $nparam, $pparam, $dparam);

                if(mysqli_stmt_execute($durum))
                {
                    header("location: login.php");
                }
                else
                {
                    echo mysqli_error($baglanti);
                    echo "Hata var.";
                }
            }
        }
    }
?>

<?php include "parts/header.php"?>
<div class="container my-4">
    <?php include "parts/navbar.php" ?>
    <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="register.php" method="POST" novalidate>

                            <div class="mb-3">
                                <label for="username" class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($usernameerr)) ? 'is-invalid': ''?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $usernameerr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Mail Adresi</label>
                                <input type="email" name="email" id="email" class="form-control <?php echo (!empty($mailerr)) ? 'is-invalid': ''?>" value="<?php echo $mail; ?>">
                                <span class="invalid-feedback"><?php echo $mailerr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="number" class="form-label">Telefon Numarası</label>
                                <input type="number" name="number" id="number" class="form-control <?php echo (!empty($numbererr)) ? 'is-invalid': ''?>" value="<?php echo $number; ?>">
                                <span class="invalid-feedback"><?php echo $numbererr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="des" class="form-label">Kişi Özeti</label>
                                <input type="text" name="des" id="des" class="form-control <?php echo (!empty($deserr)) ? 'is-invalid': ''?>" value="<?php echo $des; ?>">
                                <span class="invalid-feedback"><?php echo $deserr ?></span>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                    <label for="password" class="form-label">Parola</label>
                                    <input type="password" name="password" id="password" class="form-control <?php echo (!empty($passworderr)) ? 'is-invalid': ''?>" value="<?php echo $password; ?>">
                                    <span class="invalid-feedback"><?php echo $passworderr ?></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                    <label for="confpassword" class="form-label">Parola Tekrar</label>
                                    <input type="password" name="confpassword" id="confpassword" class="form-control <?php echo (!empty($confpassworderr)) ? 'is-invalid': ''?>" value="<?php echo $confpassword; ?>">
                                    <span class="invalid-feedback"><?php echo $confpassworderr ?></span>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="register" id="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <img src="img/register.jpeg">
                </div>
            </div>
        </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
