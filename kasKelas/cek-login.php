<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password_pengguna =$_POST['password_pengguna'];

$query = "SELECT * FROM pengguna WHERE username = '$username'";
$sql = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($sql);

if ($user) {
    // Mengecek apakah passwordnya benar
    if (password_verify($password_pengguna, $user['password_pengguna'])) {
        
        // Kalau sudah login, simpan session dan arahkan ke daftar-kas.
        $_SESSION['user'] = $user;
        header('location:daftar-kas.php');
    }else{
        header('location:login.php');
        $_SESSION['error'] = "Passwordnya salah le....";    
    }
} else {
    header('location:login.php');
    $_SESSION['error'] = "Masukkin password atau username nya yang bener le....";
}
?>
