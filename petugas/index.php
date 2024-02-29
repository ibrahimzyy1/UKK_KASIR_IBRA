<?php
include("header.php");
include("navbar.php");
?>

<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        Data Barang
                        <?php
                        include('../koneksi.php');
                        $dataproduk = mysqli_query($koneksi, "SELECT * FROM produk");
                        $jumlahproduk = mysqli_num_rows($dataproduk);
                        ?>

                        <h3><?php echo $jumlahproduk; ?></h3>
                        <a href="data_barang.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        Data Pembelian
                        <?php
                        include('../koneksi.php');
                        $datapenjualan = mysqli_query($koneksi, "SELECT * FROM penjualan");
                        $jumlahpenjualan = mysqli_num_rows($datapenjualan);
                        ?>

                        <h3><?php echo $jumlahpenjualan; ?></h3>
                        <a href="pembelian.php" class="btn btn-outline-primary" btn-sm>Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-5">
    <div class="card-body">
        <p class="text">Selamat Datang dihalaman Administrator, Silahkan anda bisa mengakses beberapa
            fitur</p>
    </div>
</div>

<?php
include("footer.php");
?>