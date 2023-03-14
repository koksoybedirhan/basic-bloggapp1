<?php 
    include "libs/ayar.php";
    include "libs/vars.php";
    include "libs/functions.php";

    $nameCat = "";
    $nameCaterr = "";

    if(isset($_POST["categories"]))
    {
        //name
        if(empty(trim($_POST["nameCat"])))
        {
            $nameCaterr = "Araç ismi girmelisiniz.";
        } 
        elseif (strlen(trim($_POST["nameCat"])) < 0 or strlen(trim($_POST["nameCat"])) > 39) 
        {
            $nameCaterr = "Kategori 0-40 karakter arasında olmalıdır.";
        }
        else
        {
            $nameCat = $_POST["nameCat"];
        }

        //veritabanı
        if(empty($nameCaterr))
        {
            $sql = "INSERT INTO kategori (nameCat) VALUES (?)";
            
            if($durum = mysqli_prepare($baglanti, $sql))
            {
                $nparam = $nameCat;

                mysqli_stmt_bind_param($durum, "s", $nparam);

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

<?php include "parts/header.php" ?>
<div>
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="categories.php" method="POST">
                        <div class="mb-3">
                            <label for="nameCat" class="form-label">Kategori Adı</label>
                            <input type="text" name="nameCat" id="nameCat" class="form-control <?php echo (!empty($nameCaterr)) ? 'is-invalid': ''?>" value="<?php echo $nameCat; ?>">
                            <span class="invalid-feedback"><?php echo $nameCaterr ?></span>
                        </div>
                        <input type="submit" name="categories" id="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <img src="img/6.jpeg" width="637" height="430">
        </div>
    </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
