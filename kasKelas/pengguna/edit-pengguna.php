<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-success p-2" style="--bs-bg-opacity: .7;">

    
    <?php
    // Memasukkan koneksi database
        include "../koneksi.php";

    // Mengambil parameter id di url
    // http://localhost/kasKelas/edit-kas.php?id=6
    $id_pengguna = $_GET['id'];

    $sql = "SELECT * FROM pengguna WHERE id = '$id_pengguna'";


    // Menjalankan query untuk mengambil data
    $query = mysqli_query($koneksi, $sql);

    // Simpan query ke sebuah variabel
    $pengguna = mysqli_fetch_assoc($query);

    if (empty($pengguna)) {
        die('');
    }
    ?>

    <div class="container">
        <h3 class="text-center mt-3 text-white">
            EDIT DATA PENGGUNA
        </h3>
        <p class="text-center text-white">
            Kamu mengedit pengguna: <?= $pengguna['nama_lengkap'] ?>
        </p>
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <div class="card" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(20px);">
                    <div class="card-body">
                        <form action="update-pengguna.php" method="post">
                            <input type="hidden" name="id" value="<?= $pengguna['id'] ?>">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $pengguna['nama_lengkap'] ?>">
                            
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $pengguna['email'] ?>">
    
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $pengguna['username'] ?>">
    
                            <label>Alamat</label>
                            <textarea class="form-control" placeholder="Masukkan Alamat" name="alamat"><?= $pengguna['alamat'] ?></textarea>
                             
                            <label>No. Telepon</label>                            
                            <input type="tel" class="form-control" name="no_hp" value="<?= $pengguna['no_hp'] ?>">

                            <label>Tanggal Lahir</label>
                             <input type="date" placeholder="Masukkan Tanggal" class="form-control" name="tanggal_lahir" value="<?= $pengguna['tanggal_lahir'] ?>">
    
                             <label>Password</label>
                             <input type="password" class="form-control" name="password_pengguna" value="<?= $pengguna['password_pengguna'] ?>">

                             <button type="submit" class="btn btn-success mt-2">SUBMIT KAS</button>

                             
                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>