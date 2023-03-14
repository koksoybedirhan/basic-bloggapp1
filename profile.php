<?php

    require "libs/vars.php";
    require "libs/functions.php";  
    
    if(!isLoggedin()) {
        header("location: login.php");
        exit;
    }

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

<?php include "parts/header.php" ?>
<div>
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <section style="background-color: #f4f5f7;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="img/<?=$_SESSION['image']?>"
                                alt="Avatar" class="img-fluid my-5" width="400"/>
                            <h5 style="color: black;"><?php echo htmlspecialchars($_SESSION["username"])?></h5>
                            <br>
                            <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Bilgiler <i class="fa-regular fa-user"></i></h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-4 mb-3">
                                    <h6>Mail Adresi <i class="fa-regular fa-envelope"></i></h6>
                                    <p class="text-muted"><?php echo htmlspecialchars($_SESSION["mail"])?></p>
                                </div>
                                <div class="col-4 mb-3">
                                    <h6>Numara <i class="fa-solid fa-phone"></i></i></h6>
                                    <p class="text-muted"><?php echo htmlspecialchars($_SESSION["number"])?></p>
                                </div>
                                <div class="col-4 mb-3">
                                    <h6>Kullanıcı Yetkisi <i class="fa-solid fa-crown"></i></i></h6>
                                    <p class="text-muted"><?php echo htmlspecialchars($_SESSION["userType"])?></p>
                                </div>
                                </div>
                                <h6>Kişisel Tanımlama <i class="fa-solid fa-circle-info"></i></h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        <h6>Kişi Özeti <i class="fa-regular fa-comment-dots"></i> </h6>
                                        <p class="text-muted"><?php echo htmlspecialchars($_SESSION["des"])?></p>
                                    </div>
                                    <div class="mb-3" style="text-align: center;">
                                        <a href="profile-edit.php" class="btn btn-primary">Profile Güncelleme</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
        </div>    
    </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
