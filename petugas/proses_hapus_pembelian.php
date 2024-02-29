<?php
include '../koneksi.php';

$pelangganid = $_POST['pelangganid'];


mysqli_query($koneksi, "delete from pelanggan where pelangganid='$pelangganid'");

mysqli_query($koneksi, "delete from penjualan where pelangganid='$pelangganid'");

header("location:pembelian.php?pesan=hapus");
?>