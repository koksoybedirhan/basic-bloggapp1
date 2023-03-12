<section class="">
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <div class="container p-4 pb-0">
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
                <?php if (isLoggedin()): ?>
                    <span class="me-3">Çıkış için tıklayınız.</span>
                    <a href="./logout.php"><button type="button" class="btn btn-outline-light btn-rounded">Çıkış</button></a>
                <?php else: ?>
                    <span class="me-3">Üyelik için tıklayınız.</span>
                    <a href="./register.php"><button type="button" class="btn btn-outline-light btn-rounded">Üye Olma</button></a>
                <?php endif;?>
            </p>
        </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="about.php">bedirhankoksoy.com</a>
        </div>
    </footer>
</section>
