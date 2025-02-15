<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        include "koneksi.php";
        $pengguna_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM kas WHERE pengguna_id = $pengguna_id ORDER BY tanggal DESC";
        $query = mysqli_query($koneksi, $sql);
        $list_kas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Kas</a>
                </ul>
                <form class="d-flex gap-2 align-items-center" action="logout.php" method="POST">
                    <div>
                        <?php if (isset($_SESSION['user'])) : ?>
                            Hallo, <?= $_SESSION['user']['nama_lengkap'] ?>
                            <button class="btn btn-danger">Logout</button>
                        <?php else : ?>
                            <a href="login.php" class="btn btn-primary">Login</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center mt-5">DAFTAR KAS SAYA</h2>
        <p class="text-center">KELAS XI RPL B SMKN 3 METRO T.A 2024</p>
        <div class="card">
            <div class="card-body">
                <a href="input-kas.php" class="btn btn-success mb-3">Input Kas</a>
                <a href="my-kas.php" class="btn btn-primary mb-3">Kas Saya</a>
                <a href="daftar-kas.php" class="btn btn-info mb-3">Lihat Daftar Kas</a>
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <?php if (isset($_SESSION['user'])) : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_kas as $no => $kas) : ?>
                            <tr>
                                <td><?= $no + 1 ?></td>
                                <td><?= $kas['judul_kas'] ?></td>
                                <td><?= $kas['jenis_kas'] ?></td>
                                <td><?= $kas['nominal'] ?></td>
                                <td><?= $kas['tanggal'] ?></td>
                                <td><?= $kas['keterangan'] ?></td>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <td>
                                        <a href="edit-kas.php?id=<?= $kas['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="hapus-kas.php?id=<?= $kas['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($list_kas)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">Data tidak ada</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        $masuk = mysqli_query($koneksi, "SELECT SUM(nominal) FROM kas WHERE jenis_kas = 'Masuk'");
        $totalKasMasuk = mysqli_fetch_column($masuk);
        $keluar = mysqli_query($koneksi, "SELECT SUM(nominal) FROM kas WHERE jenis_kas = 'Keluar'");
        $totalKasKeluar = mysqli_fetch_column($keluar);
        $totalNetFlow = $totalKasMasuk - $totalKasKeluar;
        ?>
        <div>
            <ul class="list-inline">
                <li class="list-inline-item">Total Kas Masuk: <?= $totalKasMasuk ?></li>
                <li class="list-inline-item">Total Kas Keluar: <?= $totalKasKeluar ?></li>
                <li class="list-inline-item">Total Net Flow: <?= $totalNetFlow ?></li>
            </ul>
        </div>
        <div class="container mt-5">
            <h3 class="text-center">Visualisasi Data Kas Saya</h3>
            <p class="text-center">KELAS XI RPL B SMKN 3 METRO T.A 2024</p>
            <canvas id="kasChart"></canvas>
        </div>
    </div>
    <script>
        // Ambil data dari PHP ke JavaScript
        var totalKasMasuk = <?= $totalKasMasuk ?>;
        var totalKasKeluar = <?= $totalKasKeluar ?>;
        var totalNetFlow = <?= $totalNetFlow ?>;
        var ctx = document.getElementById('kasChart').getContext('2d');
        var kasChart = new Chart(ctx, {
            type: 'bar', // Bisa juga 'line', 'pie', dll
            data: {
                labels: ['Kas Masuk', 'Kas Keluar', 'Total Net Flow'],
                datasets: [{
                    label: 'Data Kas',
                    data: [totalKasMasuk, totalKasKeluar, totalNetFlow],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Kas Masuk
                        'rgba(255, 99, 132, 0.2)', // Kas Keluar
                        'rgba(54, 162, 235, 0.2)' // Total Net Flow
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Kas Masuk
                        'rgba(255, 99, 132, 1)', // Kas Keluar
                        'rgba(54, 162, 235, 1)' // Total Net Flow
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
