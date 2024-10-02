<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-success p-2" style="--bs-bg-opacity: .7;">

    <div class="container">
        <h3 class="text-center mt-3 text-white">
            INPUT KAS KELAS
        </h3>
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <div class="card" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(20px);">
                    <div class="card-body">
                        <form action="simpan-kas.php" method="post">
                            <label>Judul Kas</label>
                            <input type="text" class="form-control" name="judul_kas">
                            
                            <label>Jenis Kas</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kas">
                                <option selected>Pilih Jenis Kas</option>
                                <option value="Masuk">Kas Masuk</option>
                                <option value="Keluar">Kas Keluar</option>
                            </select>
    
                            <label>Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="nominal">
                            </div>
    
                             <label>Tanggal</label>
                             <input type="date" placeholder="Masukkan Tanggal" class="form-control" name="tanggal">
    
                             <label>Keterangan</label>
                             <textarea class="form-control" placeholder="Masukkan Keterangan" name="keterangan"></textarea>

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