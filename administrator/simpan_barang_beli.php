<?php
include '../koneksi.php';

$produkid = $_POST['produkid'];
$detailid = $_POST['detailid'];
$pelangganid = $_POST['pelangganid'];

mysqli_query($koneksi, "update detailpenjualan set produkid='$produkid' where detailid='$detailid'");

header("location:detail_pembelian.php?pelangganid=$pelangganid");


?>