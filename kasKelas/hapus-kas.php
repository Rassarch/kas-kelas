<?php
// Koneksi ke database
include "koneksi.php";

// Cek apakah id dikirim melalui parameter URL
if (isset($_GET['id'])) {
    $kas_id = $_GET['id'];

    // Query untuk menghapus data kas berdasarkan id
    $sql = "DELETE FROM kas WHERE id = ?";
    
    // Mempersiapkan statement
    if ($stmt = mysqli_prepare($koneksi, $sql)) {
        
        // Mengikat parameter (hanya satu parameter dengan tipe integer)
        mysqli_stmt_bind_param($stmt, "i", $kas_id);
        
        // Menjalankan statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect setelah berhasil menghapus
            header("Location: daftar-kas.php?message=success");
            exit();
        } else {
            echo "Gagal menghapus data.";
        }
        
        // Menutup statement
        mysqli_stmt_close($stmt);
    }
} else {
    // Jika id tidak ada di URL, redirect kembali ke daftar-kas
    header("Location: daftar-kas.php");
    exit();
}

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
