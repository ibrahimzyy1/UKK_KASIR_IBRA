<?php
include("header.php");
include("navbar.php");
?>

<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "simpan") { ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Simpan
        </div>
        <?php } ?>
        <?php if ($_GET['pesan'] == "update") { ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Update
        </div>
        <?php } ?>
        <?php if ($_GET['pesan'] == "hapus") { ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil Di Hapus
        </div>
        <?php } ?>
        <?php
        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;

                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.pelangganid=penjualan.pelangganid");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['pelangganid']; ?></td>
                    <td><?php echo $d['namapelanggan']; ?></td>
                    <td><?php echo $d['nomortelepon']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['totalharga']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm"
                            href="detail_pembelian.php?pelangganid=<?php echo $d['pelangganid']; ?>">Detail</a>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#edit-data<?php echo $d['pelangganid']; ?>">Edit</button>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#hapus-data<?php echo $d['pelangganid']; ?>">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Edit Data -->
                <div class="modal fade" id="edit-data<?php echo $d['pelangganid']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="proses_update_pembelian.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="pelangganid" value="<?php echo $d['pelangganid']; ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input type="text" name="namapelanggan"
                                            value="<?php echo $d['namapelanggan']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" name="nomortelepon" value="<?php echo $d['nomortelepon']; ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="hapus-data<?php echo $d['pelangganid']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="proses_hapus_pembelian.php" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="pelangganid" value="<?php echo $d['pelangganid']; ?>">
                                    apakah anda yakin ingin menghapus data ini
                                    <b><?php echo $d['namapelanggan']; ?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal tambah data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_pembelian.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="text" name="pelangganid" value="<?php echo date("dmHis") ?>" class="form-control"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="nomortelepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                        <input type="hidden" name="tanggalpenjualan" value="<?php echo date("Y-m-d") ?>"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </div>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>