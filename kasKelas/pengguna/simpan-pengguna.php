<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php
                        // Memasukkan koneksi ke sini
                        include "../koneksi.php";

                        // Cek apakah koneksi berhasil
                        if (!$koneksi) {
                            die('<div class="alert alert-danger" role="alert">Koneksi gagal: ' . mysqli_connect_error() . '</div>');
                        }

                        // Ambil data dari form
                        $nama_lengkap = $_POST['nama_lengkap'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $alamat = $_POST['alamat'];
                        $no_hp = $_POST['no_hp'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $password_pengguna = $_POST['password_pengguna'];

                        // Validasi input
                        $errors = [];

                        // Cek apakah semua field diisi
                        if (empty($nama_lengkap)) {
                            $errors[] = "Nama lengkap harus diisi.";
                        }
                        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors[] = "Email tidak valid.";
                        }
                        if (empty($username)) {
                            $errors[] = "Username harus diisi.";
                        }
                        if (empty($alamat)) {
                            $errors[] = "Alamat harus diisi.";
                        }
                        if (empty($no_hp) || !preg_match('/^[0-9]+$/', $no_hp)) {
                            $errors[] = "Nomor HP harus berupa angka.";
                        }
                        if (empty($tanggal_lahir)) {
                            $errors[] = "Tanggal lahir harus diisi.";
                        }
                        if (empty($password_pengguna) || strlen($password_pengguna) < 6) {
                            $errors[] = "Password harus minimal 6 karakter.";
                        }

                        // Jika ada error, tampilkan pesan error
                        if (!empty($errors)) {
                            foreach ($errors as $error) {
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                        } else {
                            // Jika validasi lolos, lanjutkan menyimpan ke database
                            $stmt = $koneksi->prepare("INSERT INTO pengguna (nama_lengkap, email, username, alamat, no_hp, tanggal_lahir, password_pengguna) VALUES (?, ?, ?, ?, ?, ?, ?)");

                            if ($stmt === false) {
                                die('<div class="alert alert-danger" role="alert">Error dalam prepare statement: ' . $koneksi->error . '</div>');
                            }

                            $stmt->bind_param("sssssss", $nama_lengkap, $email, $username, $alamat, $no_hp, $tanggal_lahir, $password_pengguna);

                            if ($stmt->execute()) {
                                echo '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Error dalam eksekusi: ' . $stmt->error . '</div>';
                            }

                            $stmt->close(); // Menutup prepared statement
                        }

                        $koneksi->close(); // Menutup koneksi
                    ?>
                    <a href="input-pengguna.php" class="btn btn-success btn-sm mt-2">Kembali</a>
                    <a href="daftar-pengguna.php" class="btn btn-primary btn-sm mt-2">Lihat Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
