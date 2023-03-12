<?php
    function getBlogs() {
        include "ayar.php";

        $query = "SELECT * from araclar inner join kategori on araclar.category=kategori.id";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function getCategories() {
        include "ayar.php";

        $query = "SELECT * from kategori";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function getUsers() {
        include "ayar.php";

        $query = "SELECT id, username, mail, number from uyeler";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function getMessage() {
        include "ayar.php";

        $query = "SELECT id, usname, message, mdate from mesaj";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function getDes() {
        include "ayar.php";

        $query = "SELECT des from uyeler";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function getUsersEdit(int $id) {
        include "ayar.php";
    
        $query = "SELECT * from uyeler WHERE id='$id'";
        $result = mysqli_query($baglanti,$query);
        mysqli_close($baglanti);
        return $result;
    }

    function editUsers(string $id, string $name, string $mail, string $number, string $pass, string $des) {
        include "ayar.php";
    
        $query = "UPDATE uyeler SET username='$name', mail='$mail', number='$number', password='$pass', des='$des' WHERE id=$id";
        $result = mysqli_query($baglanti,$query);
        echo mysqli_error($baglanti);
    
        return $result;
    }

    function getMessageArac() {
        include "ayar.php";

        $query = "SELECT id, usname, message, mdate from mesajarac";
        $result = mysqli_query($baglanti, $query);
        mysqli_close($baglanti);
        return $result;
    }

    function deleteUser(int $id) {
        include "ayar.php";
        $query = "DELETE FROM uyeler WHERE id=$id";
        $result = mysqli_query($baglanti,$query);
        return $result;
    }

    function isLoggedin() {
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            return true;
        } else {
            return false;
        }
    }

    function isAdmin() {
        if (isLoggedin() && isset($_SESSION["userType"]) && $_SESSION["userType"] === "Admin") {
            return true;
        } else {
            return false;
        }
    }
?>
