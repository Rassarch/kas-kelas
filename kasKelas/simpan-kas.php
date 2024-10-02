<?php
    


// Memasukkkan koneksi kedalam sini
include "Koneksi.php";

$judul_kas = $_POST ['judul_kas'];
$jenis_kas = $_POST ['jenis_kas'];
$nominal = $_POST ['nominal'];
$tanggal = $_POST ['tanggal'];
$keterangan = $_POST ['keterangan'];

$sql = "INSERT INTO kas(judul_kas, jenis_kas, nominal, tanggal, keterangan)
        VALUES ('$judul_kas', '$jenis_kas', '$nominal', '$tanggal', '$keterangan')";

$simpan = mysqli_query($koneksi, $sql);

if ($simpan) {
    echo "Data berhasil disimpan";
}

?>


<a href="input-kas.php" class="btn btn-success">Kembali</a>
<a href="daftar-kas.php" class="btn btn-success">Lihat Daftar</a>