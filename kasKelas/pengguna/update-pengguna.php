<?php
    include "../koneksi.php";

    // Ambil data yang masuk
    // Pakai method post
    $id_pengguna = $_POST['id'];
    $nama_lengkap = $_POST ['nama_lengkap'];
    $email = $_POST ['email'];
    $username = $_POST ['username'];
    $alamat = $_POST ['alamat'];
    $no_hp = $_POST ['no_hp'];
    $tanggal_lahir = $_POST ['tanggal_lahir'];
    $password_pengguna = $_POST ['password_pengguna'];

    // 
    $sql = "UPDATE pengguna SET 
    nama_lengkap='$nama_lengkap', 
    email='$email', 
    username='$username', 
    alamat='$alamat', 
    no_hp='$no_hp',
    tanggal_lahir='$tanggal_lahir',
    password_pengguna='$password_pengguna'
    WHERE id='$id_pengguna'
    ";

    // Menjalankan query untuk update
    $update = mysqli_query($koneksi, $sql);

    if ($update) {
        echo "Data berhasil di update";
    }

    // Menggunakan header untuk mengarahkan ke daftar kas secara otomatis
    header('location:daftar-pengguna.php');














?>