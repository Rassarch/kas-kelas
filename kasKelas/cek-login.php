<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password_pengguna = $_POST['password_pengguna'];

$query = "SELECT * FROM pengguna WHERE username = '$username' AND password_pengguna = '$password_pengguna'";
$sql = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($sql);

if ($user) {
    // Kalau sudah login, simpan session dan arahkan ke daftar-kas.
    echo "Login berhasil, hallo " . $user['nama_lengkap'];
    $_SESSION['user'] = $user;
    header('location:daftar-kas.php');
} else {
    header('location:login.php');
    $_SESSION['error'] = "Masukkin password atau username nya yang bener le....";
}
?>
