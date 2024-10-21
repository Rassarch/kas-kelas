<?php
    session_start();

    // Mengecek apakah ada session user yang sedang login
    if (isset($_SESSION['user'])) {
        header('location:daftar-kas.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-success p-2" style="--bs-bg-opacity: .7;">

    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-4">
                <div class="card-body">
                <h2 class="text-black text-center">
                    LOGIN
                </h2>
                <form action="cek-login.php" method="post">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username">

                    <label>Password</label>
                    <input type="password" class="form-control" id="password_pengguna" name="password_pengguna">

                    <button class="btn btn-primary mt-4">Login</button>
                </form>

                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                    }
                ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>