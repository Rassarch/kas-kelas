<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>



    <?php
        include "../koneksi.php";
        $sql = "SELECT * FROM pengguna ORDER BY username DESC";
        $query = mysqli_query($koneksi, $sql);
        $list_pengguna = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>

    <div class="container">
        <h2 class="text-center mt-5">DAFTAR DATA PENGGUNA</h2>
        <p class="text-center">KELAS XI RPL B SMKN 3 METRO T.A 2024</p>
        <div class="card">
            <div class="card-body">
                <table class="table">
                <a href="input-pengguna.php" class="btn btn-success mb-3">Input Lagi</a>
                    <thead class="table-success">
                        <tr>
                            <th>Id</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($list_pengguna as $no=>$pengguna) : 
                        ?>
                        <tr>
                            <td><?= $no+1 ?></td>
                            <td><?= $pengguna['nama_lengkap'] ?></td>
                            <td><?= $pengguna['email'] ?></td>
                            <td><?= $pengguna['username'] ?></td>
                            <td><?= $pengguna['alamat'] ?></td>
                            <td><?= $pengguna['no_hp'] ?></td>
                            <td><?= $pengguna['tanggal_lahir'] ?></td>
                            <td>
                                <a href="edit-pengguna.php?id=<?= $pengguna['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus-pengguna.php?id=<?= $pengguna['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                            if (empty($list_pengguna)) :
                        ?>
                        <tr>
                            <td>Data tidak ada</td>
                        </tr>
                        <?php endif ?>
                    </tbody>

                </table>
            </div>
    </div>
</body> 
</html>