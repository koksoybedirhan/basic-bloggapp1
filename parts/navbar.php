<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                
            <?php if(isAdmin()): ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./blog-create.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Araç Ekleme</button></a></li>
                <li><a href="./categories.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Kategori Ekleme</button></a></li>
                <li><a href="./users.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Üyeler</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>

            <?php elseif (isLoggedin()): ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./blog-create.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Araç Ekleme</button></a></li>
                <li><a href="./categories.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Kategori Ekleme</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>

            <?php else: ?>

                <li><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Ana Sayfa</button></a></li>
                <li><a href="./about.php" class="nav-link px-2 text-white"><button class="btn btn-outline-light me-2">Hakkında</button></a></li>
                
            <?php endif; ?>

            </ul>

            <div class="text-end">
                

            <?php if (isLoggedin()): ?>

                <a href="#"><button type="button" class="btn btn-outline-light me-2">Hoş geldiniz: <?php echo $_SESSION["username"]?></button></a>
                <a href="./profile.php"><button type="button" class="btn btn-outline-light me-2">Profil</button></a>
                <a href="./logout.php"><button type="button" class="btn btn-warning">Çıkış</button></a>

            <?php else: ?>

                <a href="./login.php"><button type="button" class="btn btn-outline-light me-2">Giriş</button></a>
                <a href="./register.php"><button type="button" class="btn btn-outline-light me-2">Üye Olma</button></a>

            <?php endif; ?>
                   
            </div>
        </div>
    </div>
</header>
</body>
