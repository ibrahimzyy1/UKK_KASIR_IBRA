<?php
include '../koneksi.php';

$pelangganid = $_POST['pelangganid'];
$namapelanggan = $_POST['namapelanggan'];
$nomortelepon = $_POST['nomortelepon'];
$alamat = $_POST['alamat'];
$tanggalpenjualan = $_POST['tanggalpenjualan'];

mysqli_query($koneksi, "insert into pelanggan values('$pelangganid','$namapelanggan','$alamat','$nomortelepon')");
mysqli_query($koneksi, "insert into penjualan values('','$tanggalpenjualan','','$pelangganid')");

header("location:pembelian.php?pesan=simpan");

?>