<?php
    include "libs/vars.php";
    include "libs/functions.php";
?>

<?php include "parts/header.php" ?>
<div class="container my-4">
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="row">
        <div class="col-6">
            <h2 style="text-align: center;">Üye Listesi</h2>
            <table class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Kullanıcı Adı</th>
                        <th scope="col">Mail Adresi</th>
                        <th scope="col">Numara</th>
                    </tr>
                </thead>  
                <?php  $result = getusers();  while($uyeler = mysqli_fetch_assoc($result)): ?>
                <tbody> 
                    <tr class="table-info"> 
                        <th><?php echo $uyeler["username"]?></th>
                        <th><?php echo $uyeler["mail"]?></th>
                        <th><?php echo $uyeler["number"]?></th>
                    </tr>
                </tbody>
                <?php endwhile; ?>
            </table>
        </div>
        <div class="col-6">
            <img src="img/users.jpeg" width="637" height="430">
        </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
