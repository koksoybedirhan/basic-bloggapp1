<?php
    include "libs/ayar.php";
    include "libs/functions.php";
    include "libs/vars.php";

    $username = $mail = $number = $address = $des = "";
    $usernameerr = $mailerr = $numbererr = $addresserr = $deserr = "";

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
        elseif (strlen(trim($_POST["des"])) < 10 or strlen(trim($_POST["des"])) > 300) 
        {
            $deserr = "Açıklama 10-300 karakter arasında olmalıdır.";
        }
        else
        {
            $des = $_POST["des"];
        }

        //address
        if(empty(trim($_POST["address"])))
        {
            $addresserr = "Adres girmelisiniz.";
        }
        elseif (strlen(trim($_POST["address"])) < 5 or strlen(trim($_POST["address"])) > 100) 
        {
            $addresserr = "Adres 5-100 karakter arasında olmalıdır.";
        }
        else
        {
            $address = $_POST["address"];
        }

        //veritabanı
        if(empty($usernameerr) && empty($mailerr) && empty($numbererr) && empty($addresserr) && empty($deserr))
        {
            $sql = "INSERT INTO iletisim (iname, imail, inumber, itext, iaddress) VALUES (?,?,?,?,?)";
            
            if($durum = mysqli_prepare($baglanti, $sql))
            {
                $uparam = $username;
                $mparam = $mail;
                $nparam = $number;
                $dparam = $des;
                $aparam = $address;

                mysqli_stmt_bind_param($durum, "sssss", $uparam, $mparam, $nparam, $dparam, $aparam);

                if(mysqli_stmt_execute($durum))
                {
                    header("location: index.php");
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
<div>
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="communication.php" method="POST" novalidate>

                            <div class="mb-3">
                                <label for="username" class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($usernameerr)) ? 'is-invalid': ''?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $usernameerr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="des" class="form-label">Yöneticiye Mesaj</label>
                                <input type="text" name="des" id="des" class="form-control" <?php echo (!empty($deserr)) ? 'is-invalid': ''?>" value="<?php echo $des; ?>">
                                <span class="invalid-feedback"><?php echo $deserr ?></span>
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
                                <label for="address" class="form-label">Açık Adres</label>
                                <input type="text" name="address" id="address" class="form-control <?php echo (!empty($addresserr)) ? 'is-invalid': ''?>" value="<?php echo $address; ?>">
                                <span class="invalid-feedback"><?php echo $addresserr ?></span>
                            </div>

                            <input type="submit" name="register" id="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <img src="img/communication.jpeg">
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
