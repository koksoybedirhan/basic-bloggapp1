<?php
    include "libs/vars.php";
    include "libs/functions.php";
    include "libs/ayar.php";

    $message = $usname = " ";

    $mdate = date("H:i:s d-m-Y");

    if (isset($_POST["buton"]))
    {
        $message = $_POST["message"];
        $usname = $_SESSION["username"];

        $sql = "INSERT INTO mesajarac (usname, message, mdate) VALUES (?,?,?)";
            
        if($durum = mysqli_prepare($baglanti, $sql))
        {
            $uparam = $usname;
            $mparam = $message;
            $dparam = $mdate;

            mysqli_stmt_bind_param($durum, "sss", $uparam, $mparam, $dparam);

            if(mysqli_stmt_execute($durum))
            {
                header("location: vehicle-marketing.php");
            }
            else
            {
                echo mysqli_error($baglanti);
                echo "Hata var.";
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
        <div class="col-3">
            <h2 style="text-align: center; border: 1px solid black; padding: 5px;">Konular</h2>
            <ul class="list-group">
                <li style="text-align: center;"><a href="forum.php" class="list-group-item list-group-item-action"><button class="btn btn-outline-black me-2">Genel Sohbet</button></a></li>
                <li style="text-align: center;"><a href="vehicle-marketing.php" class="list-group-item list-group-item-action"><button class="btn btn-outline-black me-2">Araç Pazarlama</button></a></li>
                <br><br>
                <h6 style="text-align: center;"><a href="./index.php" class="nav-link px-2 text-white"><button class="btn btn-outline-dark me-2">Araçlar</button></a></h6>
                <?php  $result = getBlogs();  while($araclar = mysqli_fetch_assoc($result)): ?>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action"><?php echo $araclar["name"]." / ".$araclar["price"]?></li>
                    </ul>
                <?php endwhile;?>
            </ul>
        </div>
        <div class="col-9">
            <h2 style="text-align: center;">Forum Kısmı - Araç Pazarlama</h2>
                <div class="card">
                    <p>
                    <?php $result = getMessageArac();  while($mesajarac = mysqli_fetch_assoc($result)): ?>
                        <?php echo $mesajarac["usname"].": ".$mesajarac["message"]." /   ".$mesajarac["mdate"]." "; ?>
                        <br>
                    <?php endwhile; ?>                
                    </p>
                </div>
            <br>

            <form action="vehicle-marketing.php" method="POST">
                <p style="text-align: center;">Mesaj Gönderme</p>
                <textarea name="message" id="message" style="resize: none; width: 966px; height: 25px;"></textarea>
                <br>
                    <input type="submit" name="buton" id="buton" class="btn btn-primary">
            </form>
        </div>
    </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
