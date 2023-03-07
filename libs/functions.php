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
