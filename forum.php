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

        $sql = "INSERT INTO mesaj (usname, message, mdate) VALUES (?,?,?)";
            
        if($durum = mysqli_prepare($baglanti, $sql))
        {
            $uparam = $usname;
            $mparam = $message;
            $dparam = $mdate;

            mysqli_stmt_bind_param($durum, "sss", $uparam, $mparam, $dparam);

            if(mysqli_stmt_execute($durum))
            {
                header("location: forum.php");
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
<div class="container my-4">
    <?php include "parts/navbar.php" ?>
    <br>
    <div class="row">
        <div class="col-3">
            <h2 style="text-align: center;">Konular</h2>
            <ul class="list-group">
                <li style="text-align: center;"><a href="general-chat.php" class="list-group-item list-group-item-action"><button class="btn btn-outline-black me-2">Genel Sohbet</button></a></li>
                <li style="text-align: center;"><a href="vehicle-marketing.php" class="list-group-item list-group-item-action"><button class="btn btn-outline-black me-2">Araç Pazarlama</button></a></li>
            </ul>
        </div>
        <div class="col-9">
            <h2 style="text-align: center;">Forum Kısmı</h2>
                <p style="border-style: groove; width: 966px; height: 400px">
                <?php $result = getMessage();  while($mesaj = mysqli_fetch_assoc($result)): ?>
                    <?php echo $mesaj["usname"].": ".$mesaj["message"]." /   ".$mesaj["mdate"]." "; ?>
                    <br>
                <?php endwhile; ?>                
                </p>
            <br><br>

            <form action="forum.php" method="POST">
                <textarea name="message" id="message" style="resize: none; width: 600px; height: 25px;"></textarea>
                <br>
                <input type="submit" name="buton" id="buton" class="btn btn-primary">
            </form>
        </div>
    </div>
    <br>
    <?php include "parts/footer.php" ?>
</div>
</html>
