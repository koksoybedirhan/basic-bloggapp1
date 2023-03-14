<style>
    button:hover
    {
        color: black;
        background: white;
        border-radius: 5px;
        border: 1px solid black;
    }
</style>

<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                
            <?php if(isAdmin()): ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./forum.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Forum</button></a></li>
                <li><a href="./blog-create.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Araç Ekleme</button></a></li>
                <li><a href="./categories.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Kategori Ekleme</button></a></li>
                <li><a href="./users.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Üyeler</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>

            <?php elseif (isLoggedin()): ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./forum.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Forum</button></a></li>
                <li><a href="./blog-create.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Araç Ekleme</button></a></li>
                <li><a href="./categories.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Kategori Ekleme</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>

            <?php else: ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./forum.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Forum</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>
                
            <?php endif; ?>

            </ul>

            <div class="text-end">
                
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            <?php if (isLoggedin()): ?>

                <li><a href="#" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2"><?php echo $_SESSION["username"]?></button></a></li>
                <li><a href="./profile.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Profil</button></a></li>
                <li><a href="./logout.php" class="nav-link px-2 text-white"><button class="btn btn-outline-danger me-2">Çıkış</button></a></li>

            <?php else: ?>

                <li><a href="./login.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Giriş</button></a></li>
                <li><a href="./register.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Üye Olma</button></a></li>

            <?php endif; ?>

                   
            </div>
        </div>
    </div>
</header>
</body>
 
