<?php
    include "koneksi.php";

    // Ambil data yang masuk
    // Pakai method post
    $id = $_POST['id'];
    $judul_kas = $_POST ['judul_kas'];
    $jenis_kas = $_POST ['jenis_kas'];
    $nominal = $_POST ['nominal'];
    $tanggal = $_POST ['tanggal'];
    $keterangan = $_POST ['keterangan'];

    // 
    $sql = "UPDATE kas SET 
    judul_kas='$judul_kas', 
    jenis_kas='$jenis_kas', 
    nominal='$nominal', 
    tanggal='$tanggal', 
    keterangan='$keterangan'
    WHERE id='$id'
    ";

    // Menjalankan query untuk update
    $update = mysqli_query($koneksi, $sql);

    if ($update) {
        echo "Data berhasil di update";
    }

    // Menggunakan header untuk mengarahkan ke daftar kas secara otomatis
    header('location:daftar-kas.php');














?>