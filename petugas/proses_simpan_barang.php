<?php
include '../koneksi.php';

$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($koneksi, "insert into produk values('', '$namaproduk','$harga','$stok')");

header("location:data_barang.php?pesan=simpan");

?>