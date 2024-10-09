<?php
    include "../koneksi.php";
    $id_pengguna = $_GET['id'];
    $query = "DELETE FROM pengguna WHERE id='$id_pengguna'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header("location:daftar-pengguna.php");
    }
?>