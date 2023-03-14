<style>
    button:hover
    {
        color: black;
        background: white;
        border-radius: 5px;
        border: 1px solid black;
    }
</style>

<section class="">
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <div class="container p-4 pb-4">
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
                <?php if (isLoggedin()): ?>
                    <span class="me-3">Çıkış için tıklayınız.</span>
                    <a href="./logout.php"><button type="button" class="btn btn-outline-light btn-rounded">Çıkış</button></a>
                <?php else: ?>
                    <span class="me-3" >Giriş için tıklayınız.</span>
                    <a href="./login.php" style="margin-right: 15px;"><button type="button" class="btn btn-outline-light btn-rounded" >Giriş</button></a>
                    <span class="me-3" style="margin-left: 15px;">Üyelik için tıklayınız.</span>
                    <a href="./register.php"><button type="button" class="btn btn-outline-light btn-rounded">Üye Olma</button></a>
                <?php endif;?>
            </p>
        </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="communication.php" style="margin-right: 15px;"><button class="btn btn-info">İletişim için tıklayın</button></a>
        <a class="text-white" href="about.php" style="margin-right: 15px;">bedirhankoksoy.com</a>
        </div>
    </footer>
</section>
