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
        include "koneksi.php";

    // Mengambil parameter id di url
    // http://localhost/kasKelas/edit-kas.php?id=6
    $kas_id = $_GET['id'];

    $sql = "SELECT * FROM kas WHERE id = '$kas_id'";


    // Menjalankan query untuk mengambil data
    $query = mysqli_query($koneksi, $sql);

    // Simpan query ke sebuah variabel
    $kas = mysqli_fetch_assoc($query);

    if (empty($kas)) {
        die('');
    }
    ?>

    <div class="container">
        <h3 class="text-center mt-3 text-white">
            EDIT KAS KELAS
        </h3>
        <p class="text-center text-white">
            Kamu mengedit kas: <?= $kas['judul_kas'] ?>
        </p>
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <div class="card" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(20px);">
                    <div class="card-body">
                        <form action="update-kas.php" method="post">
                            <input type="hidden" name="id" value="<?= $kas['id'] ?>">
                            <label>Judul Kas</label>
                            <input type="text" class="form-control" name="judul_kas" value="<?= $kas['judul_kas'] ?>">
                            
                            <label>Jenis Kas</label>
                            <select class="form-select" aria-label="Pilih jenis kas" name="jenis_kas">
                                <option value="Masuk" <?= ($kas['jenis_kas'] == 'Masuk') ? 'selected' : '' ?>>Kas Masuk</option>
                                <option value="Keluar" <?= ($kas['jenis_kas'] == 'Keluar') ? 'selected' : '' ?>>Kas Keluar</option>
                            </select>

    
                            <label>Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="nominal" value="<?= $kas['nominal'] ?>">
                            </div>
    
                             <label>Tanggal</label>
                             <input type="date" placeholder="Masukkan Tanggal" class="form-control" name="tanggal" value="<?= $kas['tanggal'] ?>">
    
                             <label>Keterangan</label>
                             <textarea class="form-control" placeholder="Masukkan Keterangan" name="keterangan"><?= $kas['keterangan'] ?></textarea>

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
