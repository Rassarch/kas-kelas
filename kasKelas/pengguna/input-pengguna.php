<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-success p-2" style="--bs-bg-opacity: .7;">

    <div class="container">
        <h3 class="text-center mt-3 text-white">
            INPUT DATA PENGGUNA
        </h3>
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <div class="card" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(20px);">
                    <div class="card-body">
                        <form action="simpan-pengguna.php" method="post">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_lengkap">
                            
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
    
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
    
                            <label>Alamat</label>
                            <textarea class="form-control" placeholder="Masukkan Alamat" name="alamat"></textarea>
                             
                            <label>No. Telepon</label>                            
                            <input type="tel" class="form-control" name="no_hp">

                            <label>Tanggal Lahir</label>
                             <input type="date" placeholder="Masukkan Tanggal" class="form-control" name="tanggal_lahir">
    
                             <label>Password</label>
                             <input type="password" class="form-control" name="password_pengguna">

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