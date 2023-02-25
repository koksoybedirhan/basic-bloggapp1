<?php
    include "libs/ayar.php";
    include "libs/vars.php";
    include "libs/functions.php";

    $name = $description = $price = $image = $category ="";
    $nameerr = $descriptionerr = $priceerr = $imageerr = $categoryerr = "";

    if (isset($_POST["blog-create"])) {
        
        //name
        if(empty(trim($_POST["name"])))
        {
            $nameeerr = "Araç ismi girmelisiniz.";
        } 
        elseif (strlen(trim($_POST["name"])) < 3 or strlen(trim($_POST["name"])) > 49) 
        {
            $usernameerr = "Araç ismi 5-50 karakter arasında olmalıdır.";
        }
        else
        {
            $name = $_POST["name"];
        }

        //description
        if(empty(trim($_POST["description"])))
        {
            $descriptionerr = "Açıklama girmelisiniz.";
        }
        elseif (strlen(trim($_POST["description"])) < 10 or strlen(trim($_POST["description"])) > 199) 
        {
            $mailerr = "Açıklama 10-200 karakter arasında olmalıdır.";
        }
        else
        {
            $description = $_POST["description"];
        }

        //price
        if(empty(trim($_POST["price"])))
        {
            $priceerr = "Fiyat girmelisiniz.";
        }
        elseif (strlen(trim($_POST["price"])) < 5 or strlen(trim($_POST["price"])) > 29) 
        {
            $numbererr = "Fiyat 5-30 karakter arasında olmalıdır.";
        }
        else
        {
            $price = $_POST["price"];
        }

        //Kategori
        if(empty(trim($_POST["category"])))
        {
            $categoryerr = "Kategori girmelisiniz.";
        }
        elseif (strlen(trim($_POST["category"])) < 0 or strlen(trim($_POST["category"])) > 10) 
        {
            $categoryerr = "Kaegori 0-10 karakter arasında olmalıdır.";
        }
        else
        {
            $category = $_POST["category"];
        }

        //veritabanı
        if(empty($nameerr) && empty($descriptionerr) && empty($priceerr) && empty($imageerr) && empty($categoryerr))
        {
            //image
            //bir daha bakılacak.
            if (isset($_FILES['image'])) {

                $img_name = $_FILES['image']['name'];
                $img_size = $_FILES['image']['size'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
            
                if ($img_size > 500000) {
                    $imageerr = "Dosya çok büyük.";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
            
                    $allowed_exs = array("jpg", "jpeg", "png"); 
            
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'img/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
    
                        $sql = "INSERT INTO araclar (name, description, price, image, category) VALUES (?,?,?,'$new_img_name',?)";
                        if($durum = mysqli_prepare($baglanti, $sql))
                        {
                            $nparam = $name;
                            $dparam = $description;
                            $pparam = $price;
                            $cparam = $category;
            
                            mysqli_stmt_bind_param($durum, "ssss", $nparam, $dparam, $pparam, $cparam);
            
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
                    }else {
                        $imageerr = "Bu dosyayı yükleyemezsiniz.";
                    }
                }
            }else {
                $imageerr = "Dosya Yüklemelisiniz.";
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
                        <form action="blog-create.php" method="POST" novalidate enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Araç Adı</label>
                                        <input type="text" name="name" id="name" class="form-control <?php echo (!empty($nameerr)) ? 'is-invalid': ''?>" value="<?php echo $name; ?>">
                                        <span class="invalid-feedback"><?php echo $nameerr ?></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Araç Fiyatı</label>
                                        <input type="text" name="price" id="price" class="form-control <?php echo (!empty($priceerr)) ? 'is-invalid': ''?>" value="<?php echo $price; ?>">
                                        <span class="invalid-feedback"><?php echo $priceerr ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="decription" class="form-label">Araç Açıklaması</label>
                                <input type="text" name="description" id="description" class="form-control <?php echo (!empty($descriptionerr)) ? 'is-invalid': ''?>" value="<?php echo $description; ?>">
                                <span class="invalid-feedback"><?php echo $descriptionerr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Araç Resmi</label>
                                <input type="file" name="image" id="image" class="form-control <?php echo (!empty($imageerr)) ? 'is-invalid': ''?>">
                                <span class="invalid-feedback"><?php echo $imageerr ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <input type="text" name="category" id="category" class="form-control <?php echo (!empty($categoryerr)) ? 'is-invalid': ''?>" value="<?php echo $category; ?>">
                                <span class="invalid-feedback"><?php echo $categoryerr ?></span>
                            </div>

                            <input type="submit" name="blog-create" id="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <img src="img/admin-blog.jpeg" width="637" height="430">
                </div>
            </div>
        </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>