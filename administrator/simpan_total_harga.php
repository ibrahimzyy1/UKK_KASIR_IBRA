<?php
include '../koneksi.php';

$totalharga = $_POST['totalharga'];
$penjualanid = $_POST['penjualanid'];
$pelangganid = $_POST['pelangganid'];

mysqli_query($koneksi, "update penjualan set totalharga='$totalharga' where penjualanid='$penjualanid'");

header("location:detail_pembelian.php?pelangganid=$pelangganid");

?>