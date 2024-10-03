<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>



    <?php
        include "koneksi.php";
        $sql = "SELECT * FROM kas ORDER BY tanggal DESC";
        $query = mysqli_query($koneksi, $sql);
        $list_kas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>

    <div class="container">
        <h2 class="text-center mt-5">DAFTAR KAS MASUK DAN KELUAR</h2>
        <p class="text-center">KELAS XI RPL B SMKN 3 METRO T.A 2024</p>
        <div class="card">
            <div class="card-body">
            <a href="input-kas.php" class="btn btn-success mb-3">Input Lagi</a>
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($list_kas as $no=>$kas) : 
                        ?>
                        <tr>
                            <td><?= $no+1 ?></td>
                            <td><?= $kas['judul_kas'] ?></td>
                            <td><?= $kas['jenis_kas'] ?></td>
                            <td><?= $kas['nominal'] ?></td>
                            <td><?= $kas['tanggal'] ?></td>
                            <td><?= $kas['keterangan'] ?></td>
                            <td>
                                <a href="edit-kas.php?id=<?= $kas['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus-kas.php?id=<?= $kas['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                            if (empty($list_kas)) :
                        ?>
                        <tr>
                            <td>Data tidak ada</td>
                        </tr>
                        <?php endif ?>
                    </tbody>
                </table>

                <?php
                    $kasMasuk = mysqli_query($koneksi, "SELECT SUM(nominal) AS kasMasuk FROM kas WHERE jenis_kas='masuk'"); 
                    $totalKasMasuk = mysqli_fetch_column($kasMasuk);

                    $kasKeluar = mysqli_query($koneksi, "SELECT SUM(nominal) AS kasKeluar FROM kas WHERE jenis_kas='masuk'"); 
                    $totalKasKeluar = mysqli_fetch_column($kasKeluar);
                    
                    $totalKasFlow = $totalKasMasuk - $totalKasKeluar;
                ?>

                <div>
                    <ul>
                        <li>Total Kas Masuk : <?= $totalKasMasuk ?></li>
                        <li>Total Kas Keluar : <?= $totalKasKeluar ?> </li>
                        <li>Total Net Flow : <?= $totalKasFlow ?></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</body> 
</html>
