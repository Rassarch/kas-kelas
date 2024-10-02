<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kelas_db";
    
    
    // Untuk mengkoneksikan ke database
    $koneksi = mysqli_connect($servername, $username, $password, $dbname);


    // mengecek jika koneksi tidak terjadi
    if (!$koneksi) {
        die('Koneksi database gagal');
    }
?>