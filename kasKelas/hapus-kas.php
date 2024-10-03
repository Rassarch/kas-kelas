<?php
    include "koneksi.php";
    $kas_id = $_GET['id'];
    $query = "DELETE FROM kas WHERE id='$kas_id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header("location:daftar-kas.php");
    }
?>
