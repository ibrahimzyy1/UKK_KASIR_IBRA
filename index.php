
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK KASIR</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="card mt-5">
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            <p class="text-center mt-5">Silahkan Masukan Username Dan Password Anda</p>

                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo "<div class>='alert'> Username Dan Password tidak sesuai ! </div>";
                                }
                            }
                            ?>

                            <form action="cek_login.php" method="post">
                                <div>
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>

                                <div>
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>


                                <div>
                                    <button class="btn btn-primary form-control" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <img src="assets/foto.png" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>