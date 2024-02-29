<?php
include '../koneksi.php';

$pelangganid = $_POST['pelangganid'];
$namapelanggan = $_POST['namapelanggan'];
$nomortelepon = $_POST['nomortelepon'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "update pelanggan set namapelanggan='$namapelanggan', nomortelepon='$nomortelepon', alamat='$alamat' where pelangganid='$pelangganid'");

header("location:pembelian.php?pesan=update");
