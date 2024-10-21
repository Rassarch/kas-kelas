<?php
session_start();


// Memasukkkan koneksi kedalam sini
include "Koneksi.php";

$judul_kas = $_POST ['judul_kas'];
$jenis_kas = $_POST ['jenis_kas'];
$nominal = $_POST ['nominal'];
$tanggal = $_POST ['tanggal'];
$keterangan = $_POST ['keterangan'];
$pengguna_id = $_SESSION ['user']['id'];

if (empty($pengguna_id)) {
    die('Login dulu le..');
}

$sql = "INSERT INTO kas(judul_kas, jenis_kas, nominal, tanggal, keterangan, pengguna_id)
        VALUES ('$judul_kas', '$jenis_kas', '$nominal', '$tanggal', '$keterangan', '$pengguna_id')";

$simpan = mysqli_query($koneksi, $sql);

if ($simpan) {
    echo "Data berhasil disimpan";
}

?>


<a href="input-kas.php" class="btn btn-success">Kembali</a>
<a href="daftar-kas.php" class="btn btn-success">Lihat Daftar</a>