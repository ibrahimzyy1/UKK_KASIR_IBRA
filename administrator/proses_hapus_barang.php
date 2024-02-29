<?php
include '../koneksi.php';

$produkid = $_POST['produkid'];


mysqli_query($koneksi, "delete from produk where produkid='$produkid'");

header("location:data_barang.php?pesan=hapus");
?>