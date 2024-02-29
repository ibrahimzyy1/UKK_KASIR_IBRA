<?php
include '../koneksi.php';

$produkid = $_POST['produkid'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($koneksi, "update produk set namaproduk='$namaproduk', harga='$harga', stok='$stok' where produkid='$produkid'");

header("location:data_barang.php?pesan=update");
?>