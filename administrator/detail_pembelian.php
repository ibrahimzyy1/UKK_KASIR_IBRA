<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <?php
        include '../koneksi.php';
        $pelangganid = $_GET['pelangganid'];
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.pelangganid=penjualan.pelangganid");
        while($d = mysqli_fetch_array($data)){
            ?>
        <?php if ($d['pelangganid'] == $pelangganid) { ?>
        <table>
            <tr>
                <td>ID Pelanggan</td>
                <td>: <?php echo $d['pelangganid']; ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>: <?php echo $d['namapelanggan']; ?></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>: <?php echo $d['nomortelepon']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php echo $d['alamat']; ?></td>
            </tr>
            <tr>
                <td>Total Pembelian</td>
                <td>Rp. <?php echo $d['totalharga']; ?></td>
            </tr>
        </table>
        <form method="post" action="tambah_detail_penjualan.php">
            <input type="text" name="penjualanid" value="<?php echo $d['penjualanid']; ?>" hidden>
            <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>" hidden>
            <button type="submit" class="btn btn-primary btn-sm mt-2">
                Tambah Barang
            </button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        include '../koneksi.php';
                        $nos = 1;
                        $detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
                        while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
                            ?>
                <?php
                            if ($d_detailpenjualan['penjualanid'] == $d['penjualanid']) { ?>
                <tr>
                    <td><?php echo $nos++; ?></td>
                    <td>
                        <form action="simpan_barang_beli.php" method="post">
                            <div class="form-group">
                                <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>" hidden>
                                <input type="text" name="detailid" value="<?php echo $d_detailpenjualan['detailid']; ?>"
                                    hidden>
                                <select name="produkid" class="form-control" onchange="this.form.submit()">
                                    <option>---Pilih Produk---</option>
                                    <?php
                                                    include '../koneksi.php';
                                                    $no = 1;
                                                    $produk = mysqli_query($koneksi,"SELECT * FROM produk");
                                                    while($d_produk = mysqli_fetch_array($produk)){
                                                        ?>
                                    <option value="<?php echo $d_produk['produkid']; ?>"
                                        <?php if ($d_produk['produkid']==$d_detailpenjualan['produkid']) { echo "selected"; } ?>>
                                        <?php echo $d_produk['namaproduk']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="hitung_subtotal.php">
                            <?php
                                            include '../koneksi.php';
                                            $produk = mysqli_query($koneksi,"SELECT * FROM produk");
                                            while($d_produk = mysqli_fetch_array($produk)){
                                                ?>
                            <?php
                                                if ($d_produk['produkid']==$d_detailpenjualan['produkid']) { ?>
                            <input type="text" name="harga" value="<?php echo $d_produk['harga']; ?>" hidden>
                            <input type="text" name="produkid" value="<?php echo $d_produk['produkid']; ?>" hidden>
                            <input type="text" name="stok" value="<?php echo $d_produk['stok']; ?>" hidden>
                            <?php
                                                }
                                            }
                                            ?>
                            <div class="form-group">
                                <input type="number" name="jumlahproduk"
                                    value="<?php echo $d_detailpenjualan['jumlahproduk']; ?>" class="form-control">
                            </div>
                    </td>
                    <td><?php echo $d_detailpenjualan['subtotal']; ?></td>
                    <td>
                        <input type="text" name="detailid" value="<?php echo $d_detailpenjualan['detailid']; ?>" hidden>
                        <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>" hidden>
                        <button type="submit" class="btn btn-warning btn-sm">Proses</button>
                        </form>
                    <td>
                        <form method="post" action="hapus_detail_pembelian.php">
                            <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>" hidden>
                            <input type="text" name="detailid" value="<?php echo $d_detailpenjualan['detailid']; ?>"
                                hidden>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php } else {
                                ?>
                <?php
                            }
                        }
                        ?>
            </tbody>
        </table>
        <form method="post" action="simpan_total_harga.php">
            <?php
                    include '../koneksi.php';
                    $detailpenjualan = mysqli_query($koneksi,"SELECT SUM(subtotal) AS totalharga FROM detailpenjualan WHERE penjualanid='$d[penjualanid]'");
                    $row = mysqli_fetch_assoc($detailpenjualan);
                    $sum = $row['totalharga'];
                    ?>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <input type="text" class="form-control" name="totalharga" value="<?php echo $sum; ?>">
                        <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>" hidden>
                        <input type="text" name="penjualanid" value="<?php echo $d['penjualanid']; ?>" hidden>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn btn-info btn-sm form-control">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <?php } else { ?>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>